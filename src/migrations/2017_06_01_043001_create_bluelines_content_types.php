<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateBluelinesContentTypes extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('bluelines_content_types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('description')->nullable();
                $table->binary('meta')->nullable();
                $table->timestamps();
            });

            Schema::table('bluelines_options', function(Blueprint $table){
                $table->integer('bluelines_content_type_id')->nullable()->after('blueline_id');
            });

            Schema::create('bluelines_content_type_bluelines_option', function (Blueprint $table) {
                $table->integer('bluelines_content_type_id');
                $table->integer('bluelines_option_id');
                $table->primary(['bluelines_content_type_id', 'bluelines_option_id'], 'type_option');
            });

        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('bluelines_content_types');
        }
    }
