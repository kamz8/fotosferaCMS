<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'remember_token','password'
    ];
    
    public function role()
    {
        return $this->role;
    }
    
    public function hasRole($role)
    {
        return Auth::user()->role;
    }      

    public function passwort()
    {
        return $this->password;
    }
    
    public function serch($keyword){
        
        return $this->where('name','LIKE','%'.$keyword.'%')
                        ->orWhere("email", "LIKE", '%'.$keyword.'%')
                        ->orWhere("role", "LIKE", '%'.$keyword.'%')->get(); 
         
    }  
    
    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = Hash::make($password);
    }    
}
