<?php

namespace App\Exports;

use App\Models\Discussion;
use App\Models\Tag;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TagsExport implements FromArray,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array():array
    {
        $sheet = [];
        $tags=Tag::where('post_type','forum')->get();
        foreach ($tags as $k=>$row) {
            $sheet[]=[
                $row["ID"],
                $row["post_title"],
                $row["post_name"],
                $row["post_content"],
                "#888",
                ($row["post_status"]=="hidden"||$row["post_status"]=='spam')?'1':'0',
                $row["post_status"]=="private"?'1':'0',
            ];
        }
        return $sheet;
    }

    public function headings():array
    {
        return ["id","name", "slug", "description", "color","is_hidden","is_restricted"];
    }
}
