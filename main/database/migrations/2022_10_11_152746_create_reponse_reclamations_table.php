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
        if(!Schema::hasTable('reponse_reclamations')) {

            Schema::create('reponse_reclamations', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->text('reponse');
                $table->foreignId('reclamations_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                $table->boolean('resolu')->nullable()->default(false);
                $table->text('image')->nullable();
            });
        }}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reponse_reclamations');
    }
};
