<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('monthly_percentages', function (Blueprint $table) {
            $table->id();
            $table->date('month');
            $table->float('percentage', 6, 2)->default(0);
            $table->string('currency', 5)->index();
            $table->timestamps();

            $table->unique(['month', 'currency']);
        });

        Schema::create('contract_monthly_percentage', function (Blueprint $table) {
            $table->increments('id');

            $table->double('percentage', 8, 4)->default(0.0000);

            $table->foreignId('monthly_percentage_id')->nullable();
            $table->foreign('monthly_percentage_id')->references('id')->on('monthly_percentages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_monthly_percentage');
        Schema::dropIfExists('monthly_percentages');
    }
};
