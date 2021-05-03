<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromArray,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array():array
    {
        $sheet = [];
        $users=User::all();
        $read_notifications_at=$marked_all_as_read_at=$avatar_url=$preferences=$read_flags_at=$suspended_until="";
        $discussion_count=$comment_count="0";
        $is_email_confirmed="1";
        foreach ($users as $row) {
            $sheet[]=[
                $row['ID'],
                $row['user_login'],
                $row['user_email'],
                $is_email_confirmed,
                $row["user_pass"],
                $avatar_url,
                $preferences,
                $row["user_registered"],
                Date::now(),
                $marked_all_as_read_at,
                $read_notifications_at,
                $discussion_count,
                $comment_count,
                $read_flags_at,
                $suspended_until,
            ];
        }
        return $sheet;
    }

    public function headings():array
    {
        return ["id", "username", "email", "is_email_confirmed", "password", "avatar_url", "preferences", "joined_at", "last_seen_at",
            "marked_all_as_read_at","read_notifications_at","discussion_count","comment_count","read_flags_at","suspended_until"];
    }
}
