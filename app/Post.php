<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'media_id', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'slug', 
    ];


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function media() {
        return $this->belongsTo('App\Media');
    }
    
    public function tag() {
        return $this->belongsToMany('App\Tag', 'post_tag')->withTimestamps();
    }    

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;

        if (!$this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
    
    public function serch($keyword){
        
        return $this->with('user','tag')->where('title','LIKE','%'.$keyword.'%')->get(); 
         
    }    
   
       

}
