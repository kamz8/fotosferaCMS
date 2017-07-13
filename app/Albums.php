<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         
    ];
        
    protected $appends = ['photos_count','cover_img'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function photos() {
        return $this->hasMany('App\Photos');
    }   
    
    public function serch($keyword){
        
        return $this->with('user','photos')->where('title','LIKE','%'.$keyword.'%')
                ->orWhere("created_at", "LIKE", '%'.$keyword.'%')->get(); 
    }
    
    public function getPhotosCountAttribute()
    {
        return $this->photos->count();
    }    
    public function getCoverImgAttribute()
    {
        $cover_image = 0;
        $photosFirst = $this->photos->first();
        if(count($photosFirst)) $cover_image = $photosFirst->media->id;
            else $cover_image = 0;
        return $cover_image;
    }     
}
