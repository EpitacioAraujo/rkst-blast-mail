<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('body');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('email_list_id')->constrained('email_lists');
            $table->foreignId('template_id')->nullable()->constrained('templates');
            $table->boolean('trace_open')->default(false);
            $table->boolean('trace_clicked')->default(false);
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaings');
    }
};
