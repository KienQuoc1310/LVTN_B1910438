<?php

use App\Events\Inst;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        // Create admin account
     
        DB::table('users')->insert([
            'usertype' => 'Admin',
            'first_name' => 'Kien',
            'last_name' => 'Quoc',            
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'image_icon' => 'admin',
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'usertype' => 'Owner',
            'first_name' => 'Kien',
            'last_name' => 'Quoc',            
            'email' => 'owner@gmail.com',
            'password' => bcrypt('owner'),
            'image_icon' => 'owner',
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'usertype' => 'User',
            'first_name' => 'Kien',
            'last_name' => 'Quoc',            
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'image_icon' => 'user',
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        
        DB::table('widgets')->insert([
            'footer_widget1_title' => 'Giới Thiệu',
            'footer_widget1_desc' => 'Website quản lý và tìm kiếm dịch vụ ăn uống tại Cần Thơ',
            'footer_widget2_title' => 'Tin Tức',
            'footer_widget2_desc' => 'Một vài nhà hàng vừa được thêm !',
            'footer_widget3_title' => 'Tin Tức',
            'footer_widget3_address' => 'Cần Thơ',
            'footer_widget3_phone' => '+84 0912345678',
            'footer_widget3_email' => 'hello@example.com',
            'about_title' => 'Giới Thiệu',
            'about_desc' => 'Giới Thiệu',
            'need_help_title' => 'Giúp Đỡ ?',
            'need_help_phone' => '+84 09012345678',
            'need_help_time' => '7h30 - 21h30 Từ thứ 2 đến thứ 7'
             
        ]);
        
        DB::table('settings')->insert([            
            'site_name' => 'CT-Food',
            'currency_symbol' => 'VNĐ',
            'site_email' => 'admin@gmail.com',
            'site_logo' => 'logo.png',
            'site_favicon' => 'favicon.png',
            'site_description' => 'CT-Food là website quản lý và tìm kiếm dịch vụ ăn uống tại Cần Thơ',
            'site_copyright' => 'Copyright © 2023 CT-Food. All Rights Reserved.',
            'home_slide_image1' => 'home_slide_image1.png',
            'home_slide_image2' => 'home_slide_image2.png',
            'home_slide_image3' => 'home_slide_image3.png',
            'page_bg_image' => 'page_bg_image.png',
            'total_restaurant' => '300',
            'total_people_served' => '1000',
            'total_registered_users' => '1234'
        ]);
         
        DB::table('restaurant_types')->insert([
            'type' => 'Cà Phê',
            'type_image' => 'Cà Phê_1697381120'
        ]);
        
        DB::table('restaurant_types')->insert([
            'type' => 'Cơm',
            'type_image' => 'Cơm_1697381140'
        ]);

        DB::table('restaurant_types')->insert([
            'type' => 'Khác',
            'type_image' => 'Khác_1697381160'   
        ]);

        DB::table('restaurant_types')->insert([
            'type' => 'Phở',
            'type_image' => 'Phở_1697381178'
        ]);

        DB::table('restaurant_types')->insert([
            'type' => 'Pizza',
            'type_image' => 'Pizza_1697381198'
        ]);

        DB::table('restaurant_types')->insert([
            'type' => 'Sushi',
            'type_image' => 'Sushi_1697381212'
        ]); 
        
       // factory('App\User', 20)->create();
    }
}
