<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class BitdefenderInit extends Migration
{
    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->create('bitdefender', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->boolean('av_enabled')->nullable();
            $table->string('product_version')->nullable();
            $table->string('av_signature_version')->nullable();
            $table->integer('last_update')->nullable();
            $table->integer('error_num')->nullable();

            $table->unique('serial_number');
            $table->index('av_enabled');
            $table->index('product_version');
            $table->index('av_signature_version');

        });
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->dropIfExists('bitdefender');
    }
}
