<?php

use Illuminate\Database\Seeder;

class Setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('settings')->insert([
                'site_name'                => 'BoyeOffice',
                'site_fb'                  => 'boyeoffice',
                'site_IG'                  => 'boyeoffice',
                'site_googleplus'          => 'boyeoffice',
                'site_fiverr'              => 'boyeoffice',
                'site_tw'                  => 'boyeoffice',
                'site_address'             => 'boyeoffice',
                'site_email'               => 'boyeoffice',
                'meta_description'	=> 'This is a blog'
              ]);
    }
}
