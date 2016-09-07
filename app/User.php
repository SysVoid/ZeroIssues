<?php

namespace ZeroIssues;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use ZeroIssues\Email;
use ZeroIssues\Login;
use ZeroIssues\Mail\VerifyEmail;
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
        $emails = Email::where('email', $email)->where('verified', true)->count();
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
            $userEmail = $user->emails()->create([
                'email' => $email,
                'token' => str_random(128),
                'verified' => false,
                'primary' => true
            ]);
        } catch (\Exception $e)
        {
            Log::error($e);
            return [
                'type' => 'error',
                'message' => 'Failed to create account. Please try again later.'
            ];
        }

        try
        {
            Mail::to($userEmail->email)->send(new VerifyEmail($user, $userEmail));
        } catch (\Exception $e)
        {
            Log::error($e);
            return [
                'type' => 'error',
                'message' => 'Failed to send verification email. Please try again later. You can resend the email by logging in.'
            ];
        }

        return [
            'type' => 'success',
            'message' => 'An email has been dispatched to activate the account.'
        ];
    }
}
