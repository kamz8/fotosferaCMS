<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model {
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fields = [
       'name' 
    ];
    
    protected $fillable = [
        'name', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at','pivot','id'
    ];
    
    public function post() {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    

    public function addList(array $tagNames=[]){

        $tagIds = [];
        
        foreach($tagNames as $tagName)
        {
            $tag = static::firstOrCreate(['name'=>$tagName]);
            if($tag) $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
    
    public function findByName($name){
        ;
    }
    
    public function listTop() {
        return $this->select(DB::raw('name, COUNT(*) as post_count'))
                ->with('Post')
                ->groupBy('name')
                ->orderBy('post_count', 'desc')
                ->limit(10)
                ->get();
        
    }

}
