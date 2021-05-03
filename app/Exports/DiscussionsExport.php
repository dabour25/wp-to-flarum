<?php

namespace App\Exports;

use App\Models\Discussion;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiscussionsExport implements FromArray,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array():array
    {
        $sheet = [];
        $discussions=Discussion::where('post_type','topic')->get();
        foreach ($discussions as $k=>$row) {
            $sheet[]=[
                $row["ID"],
                $row["post_title"],
                $row["comment_count"]==0?'0':$row["comment_count"],
                1,
                $k+1,
                $row["post_date"],
                $row["post_author"]??1,
                '',
                '',
                '',
                '',
                '',
                $row["post_name"],
                ($row["post_status"]=="hidden"||$row["post_status"]=='spam')?Date::now():'',
            ];
        }
        return $sheet;
    }

    public function headings():array
    {
        return ["id","title", "comment_count", "participant_count", "post_number_index", "created_at", "user_id", "first_post_id", "last_posted_at",
            "last_posted_user_id","last_post_id","last_post_number","slug","hidden_at"];
    }
}
