<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_model extends Model {
    
    protected $table = 'Blog';
    protected $primaryKey = 'IDBlog';
    protected $guarded = ['IDBlog'];
    public $timestamps = false;

    public function getAllBlogs() {
        $blogs = Blog_model::get();
        return $blogs;
    }
    
    public function getBlogsByUser(int $id) {
        $blogs = Blog_model::where('IDUtente', '=', $id)->get();
        return $blogs;
    }
    
    public function findBlog(int $IDBlog){
        return Blog_model::find($IDBlog);
    }

    public function deleteMioBlog(int $id) {
        Blog_model::where('Blog.IDBlog', '=', $id)->delete();

    }

    public function getNumBlog(int $id) {
        return Blog_model::where('IDUtente', '=', $id)->count();
    }

    public function getNumBlogs() {
        return Blog_model::get()->count();
    }

}