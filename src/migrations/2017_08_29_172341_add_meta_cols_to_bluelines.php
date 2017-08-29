<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaColsToBluelines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('bluelines', function (Blueprint $table) {

            // $table->json("meta")->after('type');
            // $table->json("tags")->after('type');
            // $table->json("options")->after('type');

        });

        Schema::table('bluelines_options', function (Blueprint $table) {

            $table->dropColumn("meta");
            $table->json("options");

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('bluelines', function (Blueprint $table) {

        });

    }
}
