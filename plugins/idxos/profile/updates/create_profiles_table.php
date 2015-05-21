<?php namespace Idxos\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProfilesTable extends Migration
{

    public function up()
    {
        Schema::create('idxos_profile_profiles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned->index();
            $table->string('headline')->nullable();
            $table->string('about_me')->nullable();
            $table->string('interests')->nullable();
            $table->string('books')->nullable();
            $table->string('music')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('idxos_profile_profiles');
    }

}
