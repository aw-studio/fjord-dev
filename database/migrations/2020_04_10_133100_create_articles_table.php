<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Fjord\Form\Migration\MigratePermissions;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create articles',
        'read articles',
        'update articles',
        'delete articles',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        Schema::create('article_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('article_id')->unsigned();
            $table->string('locale')->index();

            // set all columns that are translated here
            // set them to fillable in the model
            // as well as in the translation-model

            $table->string('title')->nullable();
            $table->text('text')->nullable();

            $table->unique(['article_id', 'locale']);
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
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
        Schema::dropIfExists('articles');

        Schema::dropIfExists('article_translations');

        $this->downPermissions();
    }
}
