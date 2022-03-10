<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('title',1000)->nullable(true);
            $table->string('icon',1000)->nullable(true);
            $table->string('file',1000)->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('status')->default('active');
            $table->unsignedBigInteger('group_id');
            $table->timestamps();
            $table->foreign('group_id')
                ->references('id')
                ->on('group_file')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
