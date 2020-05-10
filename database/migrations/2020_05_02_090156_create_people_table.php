<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('surname');
            $table->string('last_name');
            $table->enum('sex', ['M','F']);
            $table->string('phone');
            $table->string('email');
            $table->date('date_of_birth');
            $table->string('national_id');
            $table->boolean('confirmed_corvid');
            $table->enum('current_corvid_state', ['RECOVERED','DIED','CRITICAL','STABLE']);
            $table->boolean('on_quarantine');
            $table->smallInteger('quarantine_center_id')->nullable(true);
            $table->smallInteger('county_id');
            $table->string('occupation');
            $table->string('physical_address');
            $table->string('image_path');
            $table->string('contact_names');
            $table->string('contact_phone');
            $table->enum('contact_relation', ['PARENT','GUARDIAN','FRIEND','SPOUSE','RELATIVE']);
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
