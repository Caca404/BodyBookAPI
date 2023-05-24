<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->float('weight', 8, 2)->default(0);
            $table->float('height', 8, 2)->default(0);
            $table->float('neck', 8, 2)->default(0);
            $table->float('waist', 8, 2)->default(0);
            $table->float('hip', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('body_statuses');
    }
};
