<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'media_id', 'user_id','published_at'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'slug', 
    ];

    protected $dates = ['published_at'];

    //Eloquent: Relationships defining
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function media() {
        return $this->belongsTo('App\Media');
    }
    
    public function tag() {
        return $this->belongsToMany('App\Tag', 'post_tag')->withTimestamps();
    }    
    //end
    
    //setters artibute
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;

        if (!$this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
    
    //getters arttribute

    public function serch($keyword){
        
        return $this->with('user','tag')->where('title','LIKE','%'.$keyword.'%')->get(); 
    }    
   
    public function archiveList() {
       DB::statement('SET lc_time_names = \'pl_PL\' '); 
       return $this->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) post_count'))
                ->groupBy('year')
                ->groupBy('month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->get();
    }
    
}
