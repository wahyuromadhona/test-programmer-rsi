<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoListsTable extends Migration
{
    public function up()
    {
        Schema::create('todo_lists', function (Blueprint $table) {
            $table->id(); // BigInteger, Primary Key
            $table->string('todo', 30); // Kolom todo dengan panjang maksimal 30
            $table->date('tanggal'); // Kolom tanggal
            $table->time('jam'); // Kolom jam
            $table->enum('status', ['Belum', 'Sedang', 'Sudah']); // Kolom status
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('todo_lists');
    }
}

