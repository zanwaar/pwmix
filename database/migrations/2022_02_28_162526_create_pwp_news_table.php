<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePwpNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwp_news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('og_image');
            $table->text('description');
            $table->text('keywords');
            $table->text('content');
            $table->enum('category', ['update', 'maintenance', 'event', 'contest', 'download', 'guide', 'luckybox', 'other'])->default('other');
            $table->integer('author');
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
        Schema::dropIfExists('pwp_news');
    }
}
