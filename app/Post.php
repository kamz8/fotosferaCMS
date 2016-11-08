<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'img_url','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'slug'
    ];
    
    public function users(){
        return $this->belongsTo('App\Users');
    }


    public function setTitleAttribute($value)
      {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
          $this->attributes['slug'] = str_slug($value);
        }
      }    
}
