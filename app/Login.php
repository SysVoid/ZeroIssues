<?php

namespace ZeroIssues;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ZeroIssues\User;

class Login extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'ip_address', 'user_agent'];
    protected $guarded = ['user_id', 'ip_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
