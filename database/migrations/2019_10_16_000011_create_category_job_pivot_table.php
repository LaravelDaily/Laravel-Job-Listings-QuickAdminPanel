<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryJobPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_job', function (Blueprint $table) {
            $table->unsignedInteger('job_id');

            $table->foreign('job_id', 'job_id_fk_476513')->references('id')->on('jobs')->onDelete('cascade');

            $table->unsignedInteger('category_id');

            $table->foreign('category_id', 'category_id_fk_476513')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
