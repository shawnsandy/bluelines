<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBluelines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bluelines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->integer('bluelines_seo_id')->nullable();
            $table->integer('bluelines_file_id')->nullable();
            $table->integer('bluelines_options')->nullable();
            $table->string('title');
            $table->text('excerpt')->nullable();
            $table->text('body');
            $table->string('featured_image')->nullable();
            $table->string('slug')->nullable();
            $table->string('status')->default('DRAFT');
            $table->boolean('featured')->default(0);
            $table->string('type')->default('posts');
            $table->timestamps();
        });

        Schema::create('bluelines_options', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('blueline_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('meta');
            $table->timestamps();
        });

        Schema::create('bluelines_meta', function(Blueprint $table){
            $table->increments('id');
            $table->integer('blueline_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->timestamps();
        });

        Schema::create("bluelines_categories", function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('image')->nullable();
            $table->timestamps();
        });

        Schema::create("bluelines_tags", function(Blueprint $table) {
           $table->increments('id');
           $table->string('tag_name');
           $table->timestamps();
        });

        Schema::create("bluelines_files", function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('ext');
            $table->string('mime_type')->nullable();
            $table->string('size')->nullable();
            $table->text('description')->nullable();
            $table->text('upload_dir')->nullable();
            $table->timestamps();
        });

        Schema::create("blueline_bluelines_category", function(Blueprint $table){
            $table->integer('blueline_id');
            $table->integer('bluelines_category_id');
            $table->primary(['blueline_id', 'bluelines_category_id'], 'blueline_category');
            $table->timestamps();
        });

        Schema::create("blueline_bluelines_tag", function(Blueprint $table){
            $table->integer('blueline_id');
            $table->integer('bluelines_tag_id');
            $table->primary(['blueline_id', 'bluelines_tag_id']);
            $table->timestamps();
        });

        Schema::create("blueline_bluelines_file", function(Blueprint $table){
            $table->integer('blueline_id');
            $table->integer('bluelines_file_id');
            $table->primary(['blueline_id', 'bluelines_file_id']);
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
        Schema::dropIfExists('bluelines');
        Schema::dropIfExists('bluelines_options');
        Schema::dropIfExists('bluelines_categories');
        Schema::dropIfExists('bluelines_tags');
        Schema::dropIfExists('bluelines_files');
        Schema::dropIfExists('bluelines_meta');
        Schema::dropIfExists('bluelines_bluelines_categories');
        Schema::dropIfExists('bluelines_bluelines_tags');
        Schema::dropIfExists('bluelines_bluelines_files');
    }


}
