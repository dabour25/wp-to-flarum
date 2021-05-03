<?php

namespace App\Imports;

use App\Models\Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TagsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $rows=["id","name", "slug", "description", "color","is_hidden","is_restricted"];
        $record=[];
        foreach ($rows as $r){
            $record[$r]=$row[$r];
        }
        return new Tag($record);
    }
}
