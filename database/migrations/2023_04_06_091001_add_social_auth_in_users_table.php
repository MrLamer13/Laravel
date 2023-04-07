<?php

use App\Enums\Users\TypeAuthEnum;
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
        Schema::table('users', function (Blueprint $table) {
            $table
                ->string('social_id')
                ->default('')
                ->after('id');
            $table
                ->enum('type_auth', TypeAuthEnum::getValues())
                ->default(TypeAuthEnum::SITE->value)
                ->after('social_id');
            $table->index('social_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['social_id', 'type_auth']);
        });
    }
};
