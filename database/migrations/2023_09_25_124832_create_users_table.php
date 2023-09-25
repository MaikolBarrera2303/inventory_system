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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('document',100)->unique();
            $table->string('email',100)->unique();
            $table->enum("state",["Activo","Inactivo"])->default("Activo");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId("role_id");
            $table->foreign("role_id")->references("id")->on("roles")->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table){
            $table->timestamp('created_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
