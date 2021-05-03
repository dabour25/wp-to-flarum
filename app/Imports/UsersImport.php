<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $rows=["id", "username", "email", "is_email_confirmed",
            "password", "avatar_url", "preferences", "joined_at", "last_seen_at",
            "marked_all_as_read_at","read_notifications_at","discussion_count","comment_count","read_flags_at","suspended_until"];
        $record=[];
        foreach ($rows as $r){
            $record[$r]=$row[$r];
        }
        return new User($record);
    }
}
