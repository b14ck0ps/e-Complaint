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
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_type');
            $table->text('description');
            $table->string('status')->default('pending'); // pending, in progress, resolved
            $table->string('anonymous')->default(0); // 0 = false, 1 = true
            $table->string('handle_by')->nullable(); // cyber police, hq
            $table->string('assign_to')->nullable(); // cyber police, hq
            //user table foreign key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('investigator')->nullable();
            $table->string('attachment1')->nullable();
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
        Schema::dropIfExists('complains');
    }
};
