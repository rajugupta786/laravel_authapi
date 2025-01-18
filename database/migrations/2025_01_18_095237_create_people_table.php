<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Name of the person
            $table->foreignId('parent_id')->nullable()->constrained('people')->onDelete('cascade'); // Self-referencing
            $table->timestamps();  // Timestamps for created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('people');
    }
}
