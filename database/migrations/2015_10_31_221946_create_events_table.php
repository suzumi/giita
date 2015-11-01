<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('events', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('event_title');
            $table->string('event_sponsor');
            $table->date('event_date');
            $table->time('event_time');
            $table->text('event_description');
            $table->string('event_eyecatch_img')->default('http://dummyimage.com/600x400/ccc/ffffff.png&text=No+Image');
            $table->string('event_youtube_video_id');
            $table->tinyInteger('event_status')->default(0);
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
        Schema::drop('events');
	}

}
