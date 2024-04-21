<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("title");
            $table->text("content");
            $table->tinyInteger("status")->default(0)->comment("Taskın güncel durumunu belirten alan 0 yapılmadı 1 yapılıyor 2-ertelendi 3-iptal oldu");
            $table->dateTime("deadline")->nullable();
            $table->unsignedBigInteger("cat_id");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("user_id")->on("users")->references("id");
            $table->foreign("cat_id")->on("categories")->references("id");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
