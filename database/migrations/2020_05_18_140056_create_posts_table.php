<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Fjord\Support\Migration\MigratePermissions;

class CreatePostsTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create posts',
        'read posts',
        'update posts',
        'delete posts',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            // enter all non-translated columns here
            // set them to fillable in your model

            // $table->string('title');

            

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
        
        Schema::create('post_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id')->unsigned();
            $table->string('locale')->index();

            // set all columns that are translated here
            // set them to fillable in the model
            // as well as in the translation-model
            //
            // $table->string('title')->nullable();
            // $table->text('text')->nullable();

            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
        
        Schema::dropIfExists('post_translations');

        $this->downPermissions();
    }
}
