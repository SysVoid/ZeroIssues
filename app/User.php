<?php

namespace ZeroIssues;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ZeroIssues\Email;
use ZeroIssues\Login;
use ZeroIssues\RecoveryToken;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'password'];
    protected $guarded = ['password'];

    public function logins()
    {
        return $this->hasMany(Login::class);
    }

    public function recoveryTokens()
    {
        return $this->hasMany(RecoveryToken::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public static function register($firstName, $lastName, $password, $email)
    {
        $emails = Email::where('email', $email)->where('activated', true)->count();
        if ($emails > 0)
        {
            return [
                'type' => 'error',
                'message' => 'That email address is already in use.'
            ];
        }

        try
        {
            $user = new User();
            $user->first_name = $firstName;
            $user->last_name = $lastName;
            $user->password = bcrypt($password);
            $user->save();
            $user->emails()->create([
                'email' => $email,
                'activation_token' => str_random(36),
                'activated' => false,
                'primary' => true
            ]);
        } catch (\Exception $e)
        {
            return [
                'type' => 'error',
                'message' => 'Failed to create account. Please try again later.'
            ];
        }

        // TODO: Send email

        return [
            'type' => 'success',
            'message' => 'An email has been dispatched to activate the account.'
        ];
    }
}
