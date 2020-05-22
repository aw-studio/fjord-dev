<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Fjord\Support\Migration\MigratePermissions;

class CreateTesttsTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create testts',
        'read testts',
        'update testts',
        'delete testts',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testts', function (Blueprint $table) {
            $table->bigIncrements('id');

            // enter all non-translated columns here
            // set them to fillable in your model

            // $table->string('title');



            $table->boolean('active')->default(true);

            $table->timestamps();
        });



        $this->upPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testts');



        $this->downPermissions();
    }
}
