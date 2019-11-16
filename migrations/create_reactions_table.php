<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('reaction_type_id')->unsigned()->index();
            $table->morphs('reacterable');
            $table->morphs('reactable');
            $table->double('rate', 4, 2);

            //creamos las migraciones con timestamo o unix
            if (config('reactions.timestamps')) {
                $table->timestamps();
            } else {
                $table->bigInteger('updated_at')->nullable();
                $table->bigInteger('created_at')->nullable();
            }

        });

        //tipos de reacciones
        Schema::create('reaction_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('display_name', 100);
            $table->tinyInteger('mass');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reactions');
        Schema::dropIfExists('reaction_types');
    }
}
