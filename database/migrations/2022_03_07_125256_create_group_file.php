<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_file', function (Blueprint $table) {
            $table->id();
            $table->string('title',1000);
            $table->string('icon',1000)->nullable(true);
            $table->string('image',1000)->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('status')->default('active');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            $table->foreign('type_id')
                ->references('id')
                ->on('type_files')
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
        Schema::dropIfExists('group_file');
    }
}
