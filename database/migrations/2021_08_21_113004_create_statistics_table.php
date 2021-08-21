<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('email', 256);
            $table->string('mobile', 16);
            $table->string('profile', 256)->default(null)->nullable();
            $table->string('followers', 60)->default(null)->nullable();
            $table->string('following', 60)->default(null)->nullable();
            $table->string('posts', 60)->default(null)->nullable();
            $table->string('engagement_rate', 8)->default(null)->nullable();
            $table->timestamps();

            // indexes.
            $table->index('name', 'idx_statistics_name');
            $table->index('email', 'idx_statistics_email');
            $table->index('mobile', 'idx_statistics_mobile');
            $table->index('followers', 'idx_statistics_followers');
            $table->index('engagement_rate', 'idx_statistics_engagement_rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
