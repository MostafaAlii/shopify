<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id')->unique();
            $table->unsignedBigInteger('admin_graphql_api_id')->nullable();
            $table->unsignedBigInteger('app_id')->nullable();
            $table->longText('browser_ip')->nullable();
            $table->longText('buyer_accepts_marketing')->nullable();
            $table->longText('cancel_reason')->nullable();
            $table->longText('cancelled_at')->nullable();
            $table->longText('cart_token')->nullable();
            $table->longText('checkout_id')->nullable();
            $table->longText('checkout_token')->nullable();
            $table->date('closed_at')->nullable();
            $table->longText('confirmed')->nullable();
            $table->longText('contact_email')->nullable();
            $table->longText('currency')->nullable();
            $table->float('current_subtotal_price')->nullable();
            $table->float('current_total_discounts')->nullable();
            $table->float('current_total_duties_set')->nullable();
            $table->float('current_total_tax')->nullable();
            $table->longText('customer_locale')->nullable();
            $table->longText('device_id')->nullable();
            $table->string('email')->nullable();
            $table->boolean('estimated_taxes')->nullable();
            $table->text('financial_status')->nullable();
            $table->text('fulfillment_status')->nullable();
            $table->longText('gateway')->nullable();
            $table->longText('landing_site')->nullable();
            $table->longText('landing_site_ref')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('merchant_of_record_app_id')->nullable();
            $table->text('name')->nullable();
            $table->longText('note')->nullable();
            $table->unsignedBigInteger('number')->nullable();
            $table->unsignedBigInteger('order_number')->nullable();
            $table->longText('order_status_url')->nullable();
            $table->longText('original_total_duties_set')->nullable();
            $table->longText('payment_gateway_names')->nullable();
            $table->longText('phone')->nullable();
            $table->string('presentment_currency')->nullable();
            $table->date('processed_at')->nullable();
            $table->longText('processing_method')->nullable();
            $table->longText('reference')->nullable();
            $table->longText('referring_site')->nullable();
            $table->longText('source_identifier')->nullable();
            $table->longText('source_name')->nullable();
            $table->longText('source_url')->nullable();
            $table->unsignedBigInteger('subtotal_price')->nullable();
            $table->longText('tags')->nullable();
            $table->longText('tax_lines')->nullable();
            $table->boolean('taxes_included')->nullable();
            $table->boolean('test')->nullable();
            $table->longText('token')->nullable();
            $table->unsignedFloat('total_discounts')->nullable();
            $table->unsignedFloat('total_line_items_price')->nullable();
            $table->unsignedFloat('total_price')->nullable();
            $table->unsignedFloat('total_tax')->nullable();
            $table->unsignedFloat('total_tip_received')->nullable();
            $table->unsignedBigInteger('total_weight')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('payment_terms')->nullable();
            $table->longText('refunds')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
