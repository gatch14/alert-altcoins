<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChoiceBtcOrDollarsToAltcoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('altcoins', function (Blueprint $table) {
            $table->enum('choices_value', ['BTC', '$'])->after('choices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('altcoins', function (Blueprint $table) {
            $table->dropColumn('choices_value');
        });
    }
}
