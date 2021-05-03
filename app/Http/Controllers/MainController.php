<?php

namespace App\Http\Controllers;


use App\Exports\DiscussionsExport;
use App\Exports\DiscussionsTagsExport;
use App\Exports\PostsExport;
use App\Exports\TagsExport;
use App\Exports\UsersExport;
use App\Imports\DiscussionsImport;
use App\Imports\DiscussionsTagsImport;
use App\Imports\PostsImport;
use App\Imports\TagsImport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{
    public function exportUsers(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function importUsersView(){
        $url='/users-import';
        return view('import',compact('url'));
    }
    public function importUsers()
    {
        Excel::import(new UsersImport(),request()->file('file'));
        return back();
    }

    public function exportTags(){
        return Excel::download(new TagsExport(), 'tags.xlsx');
    }
    public function importTagsView(){
        $url='/tags-import';
        return view('import',compact('url'));
    }
    public function importTags()
    {
        Excel::import(new TagsImport(),request()->file('file'));
        return back();
    }

    public function exportDiscussions(){
        return Excel::download(new DiscussionsExport, 'discussions.xlsx');
    }
    public function importDiscussionsView(){
        $url='/discussions-import';
        return view('import',compact('url'));
    }
    public function importDiscussions()
    {
        Excel::import(new DiscussionsImport(),request()->file('file'));
        return back();
    }
    public function exportDiscussionsTags(){
        return Excel::download(new DiscussionsTagsExport(), 'discussions-tags.xlsx');
    }
    public function importDiscussionsTagsView(){
        $url='/discussions-tags-import';
        return view('import',compact('url'));
    }
    public function importDiscussionsTags()
    {
        Excel::import(new DiscussionsTagsImport(),request()->file('file'));
        return back();
    }
    public function exportPostsTags(){
        return Excel::download(new PostsExport(), 'posts.xlsx');
    }
    public function importPostsTagsView(){
        $url='/posts-import';
        return view('import',compact('url'));
    }
    public function importPostsTags()
    {
        Excel::import(new PostsImport(),request()->file('file'));
        return back();
    }
}
