<?php

namespace ZeroIssues;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use ZeroIssues\Email;
use ZeroIssues\Login;
use ZeroIssues\Mail\VerifyEmail;
use ZeroIssues\RecoveryToken;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'password', 'remember_token'];
    protected $appends = ['full_name', 'primary_email'];
    protected $guarded = ['password', 'remember_token'];

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function setFullNameAttribute($value)
    {
        $this->attributes['full_name'] = $value;
    }

    public function getPrimaryEmailAttribute()
    {
        return $this->emails()->where('primary', true)->first()->email;
    }

    public function setPrimaryEmailAttribute($value)
    {
        $this->attributes['primary_email'] = $value;
    }

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

    public static function login($email, $password, $ip, $userAgent)
    {
        $emailRecord = Email::where('email', $email)->where('verified', true)->where('primary', true)->first();
        if ($emailRecord === null)
        {
            return null;
        }

        if (Auth::attempt(['id' => $emailRecord->user_id, 'password' => $password]))
        {
            Auth::user()->logins()->create([
                'ip_address' => $ip,
                'user_agent' => $userAgent
            ]);
        }

        return (Auth::check() ? Auth::user() : null);
    }

    public static function register($firstName, $lastName, $password, $email)
    {
        $emails = Email::where('email', $email)->where('verified', true)->count();
        if ($emails > 0)
        {
            return [
                'type' => 'error',
                'message' => trans('models.user.email_inuse'),
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
                'message' => trans('models.user.create_failed')
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
                'message' => trans('models.user.verification_email_failed')
            ];
        }

        return [
            'type' => 'success',
            'message' => trans('models.user.verification_email_sent')
        ];
    }

    public static function logout()
    {
        if (Auth::check())
        {
            Auth::logout();
            return [
                'type' => 'error',
                'message' => trans('models.user.logged_out')
            ];
        }

        return [
            'type' => 'error',
            'message' => trans('models.user.not_loggedin')
        ];
    }
}
