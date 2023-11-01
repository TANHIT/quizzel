<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Video extends Model
{
    use HasFactory;
    protected $primaryKey = 'video_id';

    protected $fillable = ['title', 'youtube_url', 'description','content'];

    public function registeredUsers()
        {
            return $this->belongsToMany(User::class, 'course_registrations', 'video_id', 'user_id')
                ->where('status', 'approved');
        }

        public function isApprovedByAdmin()
        {
            return $this->registeredUsers()
                ->where('user_id', auth()->user()->id)
                ->where('status', 'approved')
                ->exists();
        }
        //chech trạng thái
        public function isPendingForUser($user)
        {
            return $this->users()
                ->where('user_id', $user->id)
                ->wherePivot('status', 'pending')
                ->exists();
        }
        public function users()
        {
            return $this->belongsToMany(User::class, 'course_registrations', 'video_id', 'user_id')
                ->withPivot('status')
                ->withTimestamps();
        }

}
