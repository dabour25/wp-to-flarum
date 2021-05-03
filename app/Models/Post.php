<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    public $timestamps=false;
    protected $fillable=["id", "discussion_id", "number", "created_at", "user_id", "type", "content", "edited_at", "edited_user_id",
        "hidden_at","hidden_user_id","ip_address","is_private","is_approved"];
}
