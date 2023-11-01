<?php 
// Trong app/Models/CourseRegistration.php
namespace App\Models;
use App\Models\User;
use App\Models\Video;

use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    protected $table = 'course_registrations'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'user_id', // Khóa ngoại liên kết đến người dùng
        'video_id', // Khóa ngoại liên kết đến video
        'status', // Trạng thái (pending, approved, rejected)
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
}

?>