<?php

namespace App\Exports;

use App\Models\Discussion;
use App\Models\Tag;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiscussionsTagsExport implements FromArray,WithHeadings,ShouldAutoSize
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
                $row["post_parent"],
            ];
        }
        return $sheet;
    }

    public function headings():array
    {
        return ["discussion_id", "tag_id"];
    }
}
