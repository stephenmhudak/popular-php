<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('repo_id')->unique();
            $table->string('name');
            $table->string('owner');
            $table->string('url');
            $table->dateTime('repo_create');
            $table->dateTime('last_push');
            $table->longText('description')->nullable();
            $table->integer('stars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repositories');
    }
};
