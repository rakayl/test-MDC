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
        Schema::create('obgyns', function (Blueprint $table) {
             $table->id();
            $table->date('queue_date')->index();
            $table->integer('number');
            $table->string('no_queue');
            $table->enum('status', ['waiting','serving','done'])->default('waiting');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('pendaftaran_id')->nullable();
            $table->timestamp('called_at')->nullable();
            $table->timestamp('served_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obgyns');
    }
};
