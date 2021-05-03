<?php

namespace App\Exports;

use App\Models\Discussion;
use App\Models\Post;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromArray,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array():array
    {
        $sheet = [];
        $discussions=Post::where('post_type','topic')->get();
        foreach ($discussions as $k=>$row) {
            $sheet[]=[
                $row["ID"],
                $row["ID"],
                1,
                Date::now(),
                $row["post_author"],
                "comment",
                $row["post_content"],
            ];
        }
        foreach ($discussions as $k=>$row) {
            $posts=Post::where('post_type','reply')->where('post_parent',$row["ID"])->get();
            foreach ($posts as $l=>$post) {
                $sheet[]=[
                    $post["ID"],
                    $post["post_parent"],
                    $l+2,
                    Date::now(),
                    $post["post_author"],
                    "comment",
                    $post["post_content"],
                ];
            }
        }

        return $sheet;
    }

    public function headings():array
    {
        return ["id","discussion_id", "number", "created_at", "user_id", "type", "content"];
    }
}
