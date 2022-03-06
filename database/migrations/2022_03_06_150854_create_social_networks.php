<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialNetworks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_networks', function (Blueprint $table) {
            $table->id();
            $table->string('name',500);
            $table->string('icon',1000)->nullable(true);

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->unsignedBigInteger('deleted_by')->nullable(true);
            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('deleted_by')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('social_networks');
    }
}
