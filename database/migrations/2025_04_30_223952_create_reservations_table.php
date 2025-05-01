<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date_reservation');
            $table->boolean('repas1')->default(false); // Petit-déjeuner
            $table->boolean('repas2')->default(false); // Déjeuner
            $table->boolean('repas3')->default(false); // Dîner
            $table->boolean('annulation')->default(false);
            $table->string('matricule');
            $table->foreign('matricule')->references('matricule')->on('comptes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
