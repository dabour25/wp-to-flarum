<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion_User extends Model
{
    use HasFactory;
    protected $table='discussion_user';
    public $timestamps=false;
    protected $fillable=["discussion_id", "user_id","last_read_at","last_read_post_number","subscription"];
}
