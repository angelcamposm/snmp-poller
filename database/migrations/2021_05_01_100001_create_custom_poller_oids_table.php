<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomPollerOidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_poller_oids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custom_poller_id');
            $table->foreign('custom_poller_id')
                ->references('id')
                ->on('custom_pollers');
            $table->string('name');
            $table->string('object_id');
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
        Schema::dropIfExists('custom_poller_oids');
    }
}
