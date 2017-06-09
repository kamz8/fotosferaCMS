<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NotificationsController extends Controller
{
    public function __construct() {
        ;
    }
    function stream() {

        $response = new StreamedResponse(function () {
        $counter = rand(1, 10);
        $events = 'notify';
        $ids = [1, 12, 34, 65, 234, 18, 5];
        $json = [
            'id' => $ids[array_rand($ids)],
            'title' => 'Lorem ipsum',
            'body' => 'Aenean quis mattis tortor. In metus lectus, lacinia id ultrices nec, finibus at turpis. '
            ];            
            while (1) {
                $counter--;

                if (!$counter) {
                    echo 'event: ' . $events . "\n";
                    echo 'data: ' . json_encode($json) . "\n\n";

                    $counter = rand(1, 10);
                } else {
                    echo 'event: ping' . "\n";
                    echo 'data: {"time": "' . date(DATE_ISO8601) . '",'
                            .'"i": "'.$counter.'"'
                            . '}' . "\n\n";
                }

                ob_flush();
                flush();
                sleep(1+($counter/3));
            }            
        });
        
        $response->headers->set('Access-Control-Allow-Origin', '*'); 
        $response->headers->set('Access-Control-Allow-Methods', 'GET'); 
        $response->headers->set('Access-Control-Allow-Headers','X-Requested-With');
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache'); 
        return $response;
    }
}
