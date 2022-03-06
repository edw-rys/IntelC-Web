<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamSocialNetwork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_social_network', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('social_network_id');
            $table->unsignedBigInteger('team_id');
            $table->text('link');
            $table->foreign('social_network_id')
                ->references('id')
                ->on('planes_prices')
                ->onDelete('cascade');
            $table->foreign('team_id')
                ->references('id')
                ->on('team')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_social_network');
    }
}
