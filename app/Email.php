<?php

namespace ZeroIssues;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ZeroIssues\User;

class Email extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'email', 'token', 'verified', 'primary'];
    protected $guarded = ['email', 'token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
