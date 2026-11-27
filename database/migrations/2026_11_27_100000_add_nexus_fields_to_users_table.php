<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('program_study')->default('Teknik Mekatronika');
            $table->uuid('student_id_token')->nullable()->unique();
            $table->boolean('is_active')->default(true);
            $table->string('theme', 10)->default('light');
            $table->string('profile_visibility', 15)->default('private');
        });

        DB::table('users')->whereNull('student_id_token')->orderBy('id')->get(['id'])->each(function ($user) {
            DB::table('users')->where('id', $user->id)->update(['student_id_token' => (string) Str::uuid()]);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['student_id_token']);
            $table->dropColumn(['program_study', 'student_id_token', 'is_active', 'theme', 'profile_visibility']);
        });
    }
};
