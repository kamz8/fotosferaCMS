<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Collection;

class Options extends Model
{
    protected $table = 'options';
    
    protected $fillable = [
        'name', 'value', 
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'autoload' 
    ];

    protected $names = [
        'site_name', 'meta_description','meta_keywords','meta_author','posts_per_page','superadmin_email'
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     * @param Request $request 
     * 
     * @return bool
     */
    public $timestamps = false;    
    /**
     * Save changes in settings.
     *
     * @var array
     */    
    public function saveChanges($request) {
        $requestCollection = new Collection($request->except('_token','_method'));
        $options = $this->whereIn('name',$requestCollection->keys()->all())->get();
        foreach ($options as $option){
            if($option->value != $requestCollection->get($option->name)){
                $option->value = $requestCollection->get($option->name);
                $option->save();
            }
        };
        return $options;

    }
}
