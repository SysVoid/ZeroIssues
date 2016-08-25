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
}
