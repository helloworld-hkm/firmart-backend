<?php

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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_items')
            ->constrained(
                table: 'items', indexName: 'id_items_transactions'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('id_types')
            ->constrained(
                table: 'types', indexName: 'id_types_transactions'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->date('transaction_date');
            $table->integer('quantity_sold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
