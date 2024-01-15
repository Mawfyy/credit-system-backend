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
        Schema::create('request_credits', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->integer('value');
            $table->string('type');
            $table->string('state');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');;
            $table->integer('quantity_fax');
            $table->string('remarks_adviser')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_credits');
    }
};
