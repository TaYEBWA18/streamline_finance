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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->enum('level', ['1', '2', '3', '4', '5', '6', '7', '8'])->
            comment('1 is HC1, 2 is HC2, 3 is HC3, 4 is HC4, 5 is Clinic, 6 is Hospital, 7 Regional Referal, 8 is National Referal');
            $table->string('client_email');
            $table->string('billing_cycle');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('support_name');
            $table->string('support_phone');
            $table->string('support_email');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
