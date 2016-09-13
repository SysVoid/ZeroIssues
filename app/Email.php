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

    public static function verify($userId, $email, $token)
    {
        $records = self::where('email', $email)->where('verified', true);
        if ($records->count() > 0)
        {
            return [
                'type' => 'error',
                'message' => 'That email is already connected to an account.'
            ];
        }

        $record = self::where('user_id', $userId)->where('email', $email)->where('token', $token)->where('verified', false)->first();
        if ($record === null)
        {
            return [
                'type' => 'error',
                'message' => 'Verification token not found.'
            ];
        }

        $record->verified = true;
        $record->save();

        return [
            'type' => 'success',
            'message' => 'Your email address has been verified.'
        ];
    }
}
