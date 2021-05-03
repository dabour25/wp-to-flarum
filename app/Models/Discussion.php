<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    protected $table='discussions';
    public $timestamps=false;
    protected $fillable=["id", "title", "comment_count", "participant_count", "post_number_index", "created_at", "user_id", "first_post_id", "last_posted_at",
        "last_posted_user_id","last_post_id","last_post_number","slug","hidden_at"];
}
