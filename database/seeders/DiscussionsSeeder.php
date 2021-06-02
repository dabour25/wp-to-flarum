<?php

namespace Database\Seeders;

use App\Models\Discussion;
use App\Models\Discussion_User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DiscussionsSeeder extends Seeder
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
            //Comments
            $comments=Post::where('discussion_id',$discussion->id)->get();
            $comments_count=count($comments);
            Discussion::where('id',$discussion->id)->update(['comment_count'=>$comments_count]);
            if($comments_count>0){
                //$first_post_id=$comments[0]->id;
                $last_post_id=$comments[$comments_count-1]->id;
                $last_post_user=$comments[$comments_count-1]->user_id;
                $last_post_date=$comments[$comments_count-1]->created_at;
                $last_post_number=$comments[$comments_count-1]->number;
                Discussion::where('id',$discussion->id)->update([/*'first_post_id'=>$first_post_id,*/
                    'last_post_id'=>$last_post_id,'last_posted_user_id'=>$last_post_user,
                    'last_posted_at'=>$last_post_date,'last_post_number'=>$last_post_number]);
            }
            //Discussion Users
            if(Discussion_User::where('user_id',$discussion->user_id)->where("discussion_id",$discussion->id)->count()==0){
                Discussion_User::create(["user_id"=>$discussion->user_id,"discussion_id"=>$discussion->id,
                    "last_read_at"=>Date::now(),"last_read_post_number"=>$discussion->last_post_number]);
            }
        }
    }
}
