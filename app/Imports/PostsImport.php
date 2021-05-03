<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $rows=["id","discussion_id", "number", "created_at", "user_id", "type", "content"];
        $record=[];
        foreach ($rows as $r){
            $record[$r]=$row[$r];
        }
        return new Post($record);
    }
}
