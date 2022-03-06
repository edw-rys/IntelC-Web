<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_prices', function (Blueprint $table) {
            $table->id();
            $table->string('title',500);
            $table->float('price',10,2);
            $table->string('short_description',3000)->nullable();
            $table->string('icon',1000)->nullable(true);
            $table->string('image',1000)->nullable(true);
            $table->string('background',1000)->nullable(true);
            $table->text('description')->nullable(true);
            $table->text('video_url')->nullable(true);
            $table->text('content')->nullable(true);
            
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
        Schema::dropIfExists('planes_prices');
    }
}
