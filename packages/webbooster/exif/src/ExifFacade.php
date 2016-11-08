<?php
namespace Webbooster\Exif;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Webbooster\Exif\ExifClass
 */
class ExifFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'exif';
    }
}
