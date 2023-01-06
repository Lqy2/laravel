<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public $fillable = ['cid', 'uid', 'content','uname','cname'];
    public function user(){
        return $this->belongsTo('App\User', 'uid', 'id');
    }
}
