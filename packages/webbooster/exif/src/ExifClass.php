<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Webbooster\Exif;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Exceptions\Handler;
/**
 * Description of ExifClass
 *
 * @author Kamil Żmijowksi
 */
class ExifClass {
    
    protected $data;
    protected $fileDir;
    protected $exifCollect;
    
    public function exif($fileDir = null){
        if($fileDir != null){
            
                $this->fileDir = $fileDir;
            $this->data = $this->getArray($fileDir);
        }        
    }

    protected function getArray($fileDir)
    {
        try {
            if(!file_exists($fileDir)) throw new \Illuminate\Contracts\Filesystem\FileNotFoundException('No such file or directory: '.$fileDir); 
            else $this->exifCollect = collect(exif_read_data($fileDir,null,true));
                      
        } catch (FileNotFoundException $exception) {
           
        }

        $data = collect([]);  
        if($this->exifCollect->isEmpty()) return [];
        
        $exif = $this->exifCollect->forget(['THUMBNAIL', 'FILE']);
        
        foreach ($this->exifCollect as $key => $section)
        {   
           foreach ($section as $name => $val){
               if(!is_array($val)){ 
                   if($name == 'UndefinedTag:0xA434') $name='Lens';
                   $data->put($name , $val);
               }
           }}
           $getKey = ['Height','Width','ApertureFNumber','Make','Model','Software','DateTime',
                     'ExposureTime','ISOSpeedRatings','ShutterSpeedValue','Flash', 'FocalLength',
                     'WhiteBalance', 'Contrast', 'Saturation', 'Sharpness', 'Lens'
               ];
           $filter = $data->only($getKey);

        return  $filter;
    }
    
    public function get($key=null){
        if($key==null) return $this->data->toArray() ;
        else return $this->data->only($key);
    }
   
    public function gatRaw()
    {
        return$this->exifCollect;
    }
    
    public function setFile($fileDir)
    {
        $this->fileDir = $fileDir;
    }
    
}
