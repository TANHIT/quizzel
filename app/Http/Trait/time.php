<?php
namespace App\Http\Trait;
trait time{
    public function getTimeAgo($updated_at)
    {
        $current_time = time();
        $updated_time = strtotime($updated_at);
        $time_diff = $current_time - $updated_time;

        $seconds = $time_diff;
        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
        $days = floor($hours / 24);
        $years = floor($days / 365);

        if ($years > 0) {
            return $years . ' năm trước';
        } elseif ($days > 0) {
            return $days . ' ngày trước';
        } elseif ($hours > 0) {
            return $hours . ' giờ trước';
        } elseif ($minutes > 0) {
            return $minutes . ' phút trước';
        } else {
            return $seconds . ' giây trước';
        }
    }
}

