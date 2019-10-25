<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Spa',
                'duration' => 1.0,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pellentesque erat in lacus ullamcorper, vel dignissim sem consequat. Phasellus accumsan turpis eu urna mattis',
                'terms' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pellentesque erat in lacus ullamcorper, vel dignissim sem consequat. Phasellus accumsan turpis eu urna mattis',
                'created_at' => '2019-09-11 14:35:41',
                'updated_at' => '2019-09-11 15:51:08',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'My custom project',
                'duration' => 1.0,
                'description' => 'testt',
                'terms' => 'dsfdsfdf',
                'created_at' => '2019-09-11 14:40:06',
                'updated_at' => '2019-09-11 15:50:22',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Health Test new updated testfff',
                'duration' => 2.0,
                'description' => 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which',
                'terms' => 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which',
                'created_at' => '2019-09-11 14:55:14',
                'updated_at' => '2019-09-12 06:12:14',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'My custom project',
                'duration' => 2.0,
                'description' => 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which',
                'terms' => 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which',
                'created_at' => '2019-09-11 15:51:29',
                'updated_at' => '2019-09-11 15:51:29',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}