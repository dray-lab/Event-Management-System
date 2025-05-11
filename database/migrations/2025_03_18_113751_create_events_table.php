<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Event;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();

            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('customer_id')->references('id')->on('customers');
        });

        // Example event data
        $events = [
            ['name' => 'Event 1', 'date' => '2023-10-01', 'package_id' => 1, 'customer_id' => 1],
            ['name' => 'Event 2', 'date' => '2023-10-02', 'package_id' => 2, 'customer_id' => 2],
        ];

        foreach($events as $event){
            Event::create($event);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
