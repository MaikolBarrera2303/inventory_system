<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deleted_products', function (Blueprint $table) {
            $table->id();
            $table->string("name_responsible",100);
            $table->string("document_responsible",100);
            $table->string("code_product",100);
            $table->string("name_product",100);
            $table->integer("id_product");
            $table->timestamps();
        });

        Schema::table('deleted_products', function (Blueprint $table){
            $table->timestamp('created_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deleted_products');
    }
};
