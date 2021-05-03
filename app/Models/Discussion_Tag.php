<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion_Tag extends Model
{
    use HasFactory;
    protected $table='discussion_tag';
    public $timestamps=false;
    protected $fillable=["discussion_id", "tag_id"];
}
