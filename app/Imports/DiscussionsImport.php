<?php

namespace App\Imports;

use App\Models\Discussion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DiscussionsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $rows=["id","title", "comment_count", "participant_count", "post_number_index", "created_at", "user_id", "first_post_id", "last_posted_at",
            "last_posted_user_id","last_post_id","last_post_number","slug","hidden_at"];
        $record=[];
        foreach ($rows as $r){
            $record[$r]=$row[$r];
        }
        return new Discussion($record);
    }
}
