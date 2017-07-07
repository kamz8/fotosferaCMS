<?php

use Illuminate\Database\Seeder;
use App\Options;

class OptionsTableSeed extends Seeder
{
    /**
     * Array default options name. Instert default struktur and value to db
     *
     * @var array
     */    
    protected $default_name = [
        'site_name' => 'Fotosfera', 
        'meta_description' => 'Jakiś opis strony', 
        'meta_keywords' => '' , 
        'meta_author' => 'Kamil Żmijwoski',
        'posts_per_page' => '10',
        'admin_email' => ''
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->default_name as $name => $value){
            Options::create([
                        'name' => $name,
                        'value' => $value,
                        'autoload' => true
                    ]);            
        }
        
    }
}
