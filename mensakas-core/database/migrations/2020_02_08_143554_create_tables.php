<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name', 45);
            $table->integer('phone');
            $table->string('logo', 45)->nullable();
            $table->string('image', 45)->nullable();
            $table->boolean('active');

            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('business_id')->unsigned();
            $table->decimal('price', 9, 2);
            $table->boolean('avalible');
            $table->string('image', 45)->nullable();
            $table->bigInteger('main_product_id')->unsigned()->nullable();

            $table->index('business_id', 'fk_product_business1_idx');
            $table->index('main_product_id', 'fk_product_extra_idx');


            $table->foreign('business_id')
                ->references('id')->on('business')
                ->onDelete('cascade');

            $table->foreign('main_product_id')
                ->references('id')->on('product')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('status', 45);

            $table->timestamps();
        });

        Schema::create('order_status', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('status_id')->unsigned();
            $table->string('message', 100)->nullable();

            $table->foreign('status_id')
                ->references('id')->on('status');

            $table->timestamps();
        });

        Schema::create('payment', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->decimal('amount', 9, 2)->nullable();
            $table->string('token', 45)->nullable();
            $table->boolean('status')->nullable();

            $table->timestamps();
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('email', 45);
            $table->string('phone', 45)->nullable();

            $table->timestamps();
        });

        Schema::create('customer_address', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('customer_id')->unsigned();
            $table->string('city', 45);
            $table->integer('zip_code');
            $table->string('street', 45);
            $table->integer('number');
            $table->string('house_number', 45)->nullable();

            $table->index('customer_id', 'fk_address_customer1_idx');

            $table->foreign('customer_id')
                ->references('id')->on('customer')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('comanda', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('address_id')->unsigned()->nullable();
            $table->json('ticket_json')->nullable();

            $table->index('address_id', 'fk_comanda_address1_idx');

            $table->foreign('address_id')
                ->references('id')->on('customer_address')
                ->onDelete('set null');

            $table->timestamps();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('order_status_id')->unsigned();
            $table->bigInteger('payment_id')->unsigned();
            $table->bigInteger('comanda_id')->unsigned();

            $table->index('order_status_id', 'fk_order_status1_idx');
            $table->index('payment_id', 'fk_order_payment1_idx');
            $table->index('comanda_id', 'fk_order_purchase');

            $table->foreign('order_status_id')
                ->references('id')->on('order_status');

            $table->foreign('payment_id')
                ->references('id')->on('payment');

            $table->foreign('comanda_id')
                ->references('id')->on('comanda');

            $table->timestamps();
        });

        Schema::create('rider', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->boolean('active');
            $table->string('username', 45)->unique();
            $table->string('phone', 45)->unique();

            $table->timestamps();
        });

        Schema::create('delivery', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('riders_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->time('delivery')->nullable();

            $table->index('riders_id', 'fk_deliver_riders1_idx');
            $table->index('order_id', 'fk_deliver_order1_idx');

            $table->foreign('riders_id')
                ->references('id')->on('rider')
                ->onDelete('cascade');

            $table->foreign('order_id')
                ->references('id')->on('order');

            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->timestamps();
        });

        Schema::create('language', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('language', 45);

            $table->timestamps();
        });

        Schema::create('tag', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->timestamps();
        });

        Schema::create('tag_translation', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('language_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();;
            $table->string('tag_name', 45);

            $table->index('language_id', 'fk_tag_translation_lenguage_idx');
            $table->index('tag_id', 'fk_tag_translation_tag_idx');


            $table->foreign('language_id')
                ->references('id')->on('language');
            $table->foreign('tag_id')
                ->references('id')->on('tag');

            $table->timestamps();
        });

        Schema::create('invoice', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('payment_id')->unsigned();

            $table->index('payment_id', 'fk_invoice_payment_idx');


            $table->foreign('payment_id')
                ->references('id')->on('payment');

            $table->timestamps();
        });

        Schema::create('comanda_product', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('comanda_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer('quantity');

            $table->index('product_id', 'fk_purchase_produt');
            $table->index('comanda_id', 'fk_purchase_comanda');

            $table->foreign('product_id')
                ->references('id')->on('product')
                ->onDelete('cascade');

            $table->foreign('comanda_id')
                ->references('id')->on('comanda');

            $table->timestamps();
        });

        Schema::create('business_address', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('business_id')->unsigned();
            $table->string('city', 45);
            $table->integer('zip_code');
            $table->string('street', 45);
            $table->integer('number');

            $table->index('business_id', 'fk_address_b_business1_idx');

            $table->foreign('business_id')
                ->references('id')->on('business')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('location', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('rider_id')->unsigned();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 10, 8)->nullable();
            $table->decimal('accuracy', 6, 2)->nullable();
            $table->integer('speed')->nullable();

            $table->index('rider_id', 'fk_location_rider_idx');

            $table->foreign('rider_id')
                ->references('id')->on('rider')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('product_description', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();

            $table->index('product_id', 'fk_product_description_product1_idx');

            $table->foreign('product_id')
                ->references('id')->on('product')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('description_translation', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('product_description_id')->unsigned();
            $table->bigInteger('language_id')->unsigned();
            $table->string('name', 45);
            $table->string('description', 100);

            $table->index('product_description_id', 'fk_product_description_transalte_idx');
            $table->index('language_id', 'fk_product_description_transalte_language_idx');

            $table->foreign('product_description_id')
                ->references('id')->on('product_description')
                ->onDelete('cascade');

            $table->foreign('language_id')
                ->references('id')->on('language');

            $table->timestamps();
        });

        Schema::create('schedule', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('business_id')->unsigned();
            $table->boolean('day');
            $table->time('open_1');
            $table->time('close_1');
            $table->time('open_2')->nullable();
            $table->time('close_2')->nullable();

            $table->index('business_id', 'fk_schedule_business_idx');

            $table->foreign('business_id')
                ->references('id')->on('business')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('product_tag', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();

            $table->index('product_id', 'fk_tag_product_idx');
            $table->index('tag_id', 'fk_tag_product_tag_idx');


            $table->foreign('product_id')
                ->references('id')->on('product')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('id')->on('tag');


            $table->timestamps();
        });

        Schema::create('category_translation', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('language_id')->unsigned();
            $table->string('category', 45);

            $table->index('category_id', 'fk_category_translation_category_idx');
            $table->index('language_id', 'fk_category_translation_language_idx');


            $table->foreign('category_id')
                ->references('id')->on('category');
            $table->foreign('language_id')
                ->references('id')->on('language');

            $table->timestamps();
        });

        Schema::create('business_category', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('business_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();

            $table->index('category_id', 'fk_business_has_category_category1_idx');
            $table->index('business_id', 'fk_business_has_category_business1_idx');

            $table->foreign('business_id')
                ->references('id')->on('business')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')->on('category');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('business_category');
        Schema::drop('category_translation');
        Schema::drop('product_tag');
        Schema::drop('schedule');
        Schema::drop('description_translation');
        Schema::drop('product_description');
        Schema::drop('location');
        Schema::drop('business_address');
        Schema::drop('comanda_product');
        Schema::drop('invoice');
        Schema::drop('tag_translation');
        Schema::drop('tag');
        Schema::drop('language');
        Schema::drop('category');
        Schema::drop('delivery');
        Schema::drop('rider');
        Schema::drop('order');
        Schema::drop('comanda');
        Schema::drop('customer_address');
        Schema::drop('customer');
        Schema::drop('payment');
        Schema::drop('order_status');
        Schema::drop('status');
        Schema::drop('product');
        Schema::drop('business');
    }
}
