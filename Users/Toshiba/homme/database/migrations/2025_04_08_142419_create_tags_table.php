<?php

use App\Models\posts;
use App\Models\Tag;
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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('post_tag', function (Blueprint $table) {
            $table->foreignIdFor(posts::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
            $table->primary(['posts_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
