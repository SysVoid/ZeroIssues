<?php

namespace ZeroIssues;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ZeroIssues\User;

class RecoveryToken extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'token'];
    protected $guarded = ['token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
