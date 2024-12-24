<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requestings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->date('date');
            $table->string('cource');
            $table->enum('payment_metod', ['cash', 'card']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requestings');
    }
};
