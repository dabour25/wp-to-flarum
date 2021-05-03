<?php

namespace App\Imports;

use App\Models\Discussion_Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DiscussionsTagsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $rows=["discussion_id", "tag_id"];
        $record=[];
        foreach ($rows as $r){
            $record[$r]=$row[$r];
        }
        return new Discussion_Tag($record);
    }
}
