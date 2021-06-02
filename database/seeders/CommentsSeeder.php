<?php

namespace Database\Seeders;

use App\Models\Discussion;
use App\Models\Discussion_User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discussions=Discussion::all();
        foreach ($discussions as $discussion){
			$comments=Post::where('discussion_id',$discussion->id)->get();
            //fix comments
            foreach ($comments as $comment){
				if(substr($comment->content, 0, 6)!="<t><p>"){
					$comment->content='<t><p>'.$comment->content;
				}
				if(substr($comment->content, -8)!="</p></t>"){
					$comment->content=$comment->content.'</p></t>';
				}
                $comment->save();
            }
        }
    }
}
