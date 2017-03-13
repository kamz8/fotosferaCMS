<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'media_id', 'user_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         
    ];
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function media() {
        return $this->belongsTo('App\Media');
    }
    
    public function albums () {
        return $this->belongsTo('App\Albums');
    }


}
