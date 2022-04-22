<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function is_liked_by_auth_user(){
        $id= Auth::id();
        $likers=array();
        foreach($this->likes as $like):
            array_push($likers,$like->user_id);
        endforeach;

        if(in_array($id, $likers)){
            return true;
        }
        else{
            return false;
        }
    }
    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
