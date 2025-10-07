<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up(): void 
    {
        Schema::create('images', function (Blueprint $table) 
        {
            $table->id();
            $table->string('name');
            $table->text('url');
            $table->string('alt');
            $table->text('discription');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('images');
    }
};
