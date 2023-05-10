<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('ticket_no')->nullable();
            $table->string('product_service')->nullable();
            $table->longText('complaint')->nullable();
            $table->string('platform')->nullable();
            $table->string('link')->nullable();
            $table->string('additional_documents_file')->nullable();
            $table->foreignId('vendor_id')->nullable();
            $table->foreignId('reported_by_id')->nullable();
            $table->longText('remarks')->nullable();
            $table->boolean('isFollow')->default(false);
            $table->string('severity')->default("LOW");
            $table->string('status')->default("FOR_REVIEW");
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
        Schema::dropIfExists('tickets');
    }
}
