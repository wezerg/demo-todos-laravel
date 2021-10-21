<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    // fillable = Champs que l'on souhaite récupérer
    protected $fillable = ['id', 'title', 'description', 'extrait', 'picture'];
    // Guarded = champs que l'on ne veut pas récupérer
    //protected $guarded = [];

    public function getComments(){
        return $this->hasMany(Comment::class, "postId", "id");
    }
}
