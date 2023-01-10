<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('coin_logs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('partner_id')->unsigned();
            $table->bigInteger('candidate_id')->unsigned()->nullable();
            $table->bigInteger('job_id')->unsigned()->nullable();
//            $table->integer('coins');
            $table->enum('type', ['in', 'out']);
            $table->text('detail')->nullable();
            $table->integer('before');
            $table->integer('after');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coin_logs');
    }
};
