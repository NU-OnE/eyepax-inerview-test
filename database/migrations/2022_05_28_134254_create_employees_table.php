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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reporting_to');
            $table->string('name');
            $table->string('email', 50)->unique();
            $table->string('telephone', 10);
            $table->string('working_route', 50);
            $table->text('manager_comment')->nullable()->default(null);
            $table->date('joined_date');
            $table->timestamps();

            $table->foreign('reporting_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
