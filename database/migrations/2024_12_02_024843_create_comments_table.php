<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('message', 500);
            $table->integer('votes_count')->default(0);
            $table->foreignId('creator_id')->constrained('users');
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignId('comment_father_id')->nullable()->constrained('comments');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
