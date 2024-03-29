<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->increments('id');                 
            $table->string('footer_widget1_title');
            $table->text('footer_widget1_desc');   
            $table->string('footer_widget2_title');
            $table->text('footer_widget2_desc');   
            $table->string('footer_widget3_title');
            $table->text('footer_widget3_address'); 
            $table->string('footer_widget3_phone');
            $table->string('footer_widget3_email');            
            $table->string('about_title');
            $table->text('about_desc');                  
            $table->string('need_help_title')->nullable();
            $table->string('need_help_phone')->nullable();             
            $table->text('need_help_time')->nullable();           
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}
