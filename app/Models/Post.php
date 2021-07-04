<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'user_id'
    ];
    public function likedBy(User $user){
        //dd($this->likes);
        return $this->likes->contains('user_id',$user->id); // collection
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
