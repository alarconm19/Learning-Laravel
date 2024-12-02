<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModerateTable extends Migration
{
    public function up()
    {
        Schema::create('moderate', function (Blueprint $table) {
            $table->id();
            $table->string('action', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->foreignId('mod_id')->constrained('users');
            $table->foreignId('thread_id')->constrained('threads');
        });
    }

    public function down()
    {
        Schema::dropIfExists('moderate');
    }
}
