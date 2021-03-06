<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Fjord\Support\Migration\MigratePermissions;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create projects',
        'read projects',
        'update projects',
        'delete projects',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');

            // enter all non-translated columns here
            // set them to fillable in your model

            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('employee_id');
            $table->date('completion_date');
            $table->float('budget');
            $table->unsignedBigInteger('project_status_id');

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('project_status_id')->references('id')->on('project_statuses');

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
        Schema::dropIfExists('projects');
        $this->downPermissions();
    }
}
