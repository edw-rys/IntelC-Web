<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_files', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('system_name',100);
            $table->text('description')->nullable();
            $table->string('icon',1000)->nullable(true);
            $table->string('image',1000)->nullable(true);
            $table->string('background',1000)->nullable(true);
            $table->text('video_url')->nullable(true);
            $table->string('status')->default('active');
            $table->softDeletes();
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
        Schema::dropIfExists('type_files');
    }
}
