<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepostoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repostories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('repos_id');
            $table->string('name');
            $table->string('full_name');
            $table->string('repo_url');
            $table->text('description');
            $table->timestamp('repo_updated_at');
            $table->integer('stars');
            $table->string('language')->default('PHP');
            $table->integer('repo_owner_id');
            $table->string('repo_owner_name');
            $table->string('repo_owner_avatar');
            $table->string('repo_owner_profile_url');
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
        Schema::drop('repostories');
    }
}
