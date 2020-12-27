<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('district');
            $table->string('area');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('tags');
            $table->string('email');
            $table->string('phone');
            $table->string('website');
            $table->string('address');
            $table->float('lon');
            $table->float('lat');
            $table->integer('reviewed');
            $table->timestamps();
            $table->integer('delete_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
