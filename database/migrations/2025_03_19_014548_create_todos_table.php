<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
    */

    /*  tablas POLIMORFICAS
        Las relaciones polimorficas por lo general son uno a muchos u obtienes el registro del que es parte el polimorfico
        - uno a muchos polimorfico:  $this->morphMany(entidad::class, 'todoeable') (en el que no es polimorfico)
        - a quien pertenece el polimorfico: $this->morphTo(); (en el polimorfico)
        - muchos polimorficos son de una entidad:  $this->morphedByMany(User::class, 'roleable');  (en el polimorfico)
        - una entidad tiene muchos polimorficos: $this->morphToMany(Role::class, 'roleable'); (no va en el polimorfico)
        - cuando solo tiene un solo elemento polimorfico: $this->morphOne(Profile::class, 'profileable'); (no va en el polimorfico)
    */

    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('finished')->default(false);
            /* Genera los campos polimorficos _type y _id */
            $table->morphs('todoeable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
