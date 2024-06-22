<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('woorden', function (Blueprint $table) {
        $table->id();
        $table->string('woord');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('woorden');
    }
};
