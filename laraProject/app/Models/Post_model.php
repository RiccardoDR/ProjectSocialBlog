<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_model extends Model {
    
    protected $table = 'Post';
    protected $primaryKey = 'IDPost';
    protected $guarded = ['IDPost'];
    public $timestamps = false;

    public function getpost(int $IDBlog) {
        $posts = Post_model::select(['Post.*'])
                        ->where('IDBlog', '=', $IDBlog)->get();
        return $posts;
    }

//    public function getPost(int $idUtente, int $idBlog) {
//        $posts = Post_model::where('IDBlog', '=', $idBlog)
//                                ->where('IDUtente', '=', $idUtente)->get();
//        return $posts;
//    }

    public function createPost(string $titolo, string $descrizione, string $data, int $idBlog, int $idUtente) {
        Post_model::create([
            'Titolo' => $titolo,
            'Descrizione' => $descrizione,
            'Data' => $data,
            'Like' => 0,
            'IDBlog' => $idBlog,
            'IDUtente' => $idUtente,
        ]);
    }

    public function deletePost(int $id) {
        Post_model::where('IDPost', '=', $id)->delete();
    }

    public function getAllPosts() {
        return Post_model::get();
    }

}
