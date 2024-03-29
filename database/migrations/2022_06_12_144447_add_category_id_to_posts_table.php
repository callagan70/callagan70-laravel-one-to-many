<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	    {
	        Schema::table('posts', function (Blueprint $table) {
	                $table->unsignedBigInteger('category_id')->nullable()->after('id');
	                $table->foreign('category_id')
	                            ->reference('id')
	                            ->on('categories')->onDelete('set null'); // al plurale, con il onDelete('set null') diciamo a Laravel di non eliminare i dati come da "cascate"
	        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
