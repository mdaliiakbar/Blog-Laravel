<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('tag_id',20)->nullable();
            $table->string('title');
            $table->text('body');
            $table->json('picture')->nullable()->collation('utf8mb4_unicode_ci') ;
            $table->json('thumbnail')->nullable()->collation('utf8mb4_unicode_ci');
            $table->tinyInteger('news_type')->nullable();
            $table->date('news_date')->nullable();
            $table->tinyInteger('news_status')->nullable()->default(2)->comment("1=publish,2=draft");
            $table->text('slug')->nullable();
            $table->text('meta')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
