<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwp_players', static function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('cls');
            $table->integer('gender');
            $table->integer('spouse');
            $table->integer('level');
            $table->integer('level2');
            $table->integer('hp');
            $table->integer('mp');
            $table->integer('pariah_time');
            $table->integer('reputation');
            $table->integer('time_used');
            $table->integer('pk_count');
            $table->integer('dead_flag');
            $table->integer('force_id');
            $table->integer('title_id');
            $table->integer('faction_id');
            $table->string('faction_name');
            $table->integer('faction_role');
            $table->integer('faction_contrib');
            $table->integer('faction_feat');
            $table->text('equipment');
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
        Schema::dropIfExists('pwp_players');
    }
}
