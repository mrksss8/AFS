<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
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
            $table->foreignId('subfolder_id');
            $table->text('filename');
            $table->text('description');
            $table->text('path');
            $table->text('document');
            $table->text('role');
            $table->text('status');
            $table->timestamps();
            // FK
            $table->foreign('subfolder_id')->references('id')->on('subfolders');

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
