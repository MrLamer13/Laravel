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
        Schema::table('news', function (Blueprint $table) {
            $table->string('guid')->after('id')->nullable();
            $table->string('link')->after('description')->nullable();
            $table->timestamp('pub_date')->after('isVisible')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('guid');
            $table->dropColumn('link');
            $table->dropColumn('pub_date');
        });
    }
};
