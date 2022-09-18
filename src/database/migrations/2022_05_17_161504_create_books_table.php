<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // 作品名
            $table->string('author')->nullable(); // 原作者
            $table->string('manga_artist')->nullable(); // 漫画家
            $table->integer('rate')->nullable(); // 評価
            $table->json('assistant')->nullable(); // 漫画家
            $table->text('story', 400)->nullable(); // あらすじ
            $table->string('thumbnail')->nullable(); // 作品サムネイル

            $table->timestamps();
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
