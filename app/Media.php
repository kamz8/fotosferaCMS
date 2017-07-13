<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path', 'mimetype',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    
    /**
     * The media belongs to posts.
     */    
    public function posts(){
        return $this->hasMany('App\Posts');
    }
    
    public function photos() {
        return $this->hasone('App\Photos');
    }

}
