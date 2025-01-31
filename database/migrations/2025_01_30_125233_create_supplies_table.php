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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id("supplierID");
            $table->string("supplierName",125);
            $table->string("contactName",125)->nullable();
            $table->string("address",125)->nullable();
            $table->string("city",100)->nullable();
            $table->string("postalcode",10)->nullable();
            $table->string("country",75)->nullable();
            $table->string("phone",15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
