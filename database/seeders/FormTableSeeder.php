<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FormTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('form')->delete();
        
        \DB::table('form')->insert(array (
            0 => 
            array (
                'form_id' => 1,
                'name' => '视频模型',
                'description' => '视频模型关联表单',
                'menu' => NULL,
                'data' => '[{"type":"file","name":"\\u89c6\\u9891\\u5730\\u5740","field":"file","data":{"type":"0","required":"0"},"list":"0"}]',
                'manage' => 1,
                'search' => '',
                'create_time' => 1610675882,
                'update_time' => 1624083851,
            ),
        ));
        
        
    }
}