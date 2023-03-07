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
            $table->longText('order_id')->nullable();
            $table->longText('admin_graphql_api_id')->nullable();
            $table->longText('app_id')->nullable();
            $table->longText('browser_ip')->nullable();
            $table->longText('buyer_accepts_marketing')->nullable();
            $table->longText('cancel_reason')->nullable();
            $table->longText('cancelled_at')->nullable();
            $table->longText('cart_token')->nullable();
            $table->longText('checkout_id')->nullable();
            $table->longText('checkout_token')->nullable();
            $table->longText('closed_at')->nullable();
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
            $table->longText('processed_at')->nullable();
            $table->longText('processing_method')->nullable();
            $table->longText('reference')->nullable();
            $table->longText('referring_site')->nullable();
            $table->longText('source_identifier')->nullable();
            $table->longText('source_name')->nullable();
            $table->longText('source_url')->nullable();
            $table->longText('tags')->nullable();
            $table->longText('tax_lines')->nullable();
            $table->longText('tracking_number')->nullable();
            $table->boolean('taxes_included')->nullable();
            $table->boolean('test')->nullable();
            $table->longText('token')->nullable();
            $table->longText('total_discounts')->nullable();
            $table->longText('total_line_items_price')->nullable();
            $table->longText('subtotal_price')->nullable();
            $table->longText('total_price')->nullable();
            $table->longText('total_tax')->nullable();
            $table->longText('total_tip_received')->nullable();
            $table->longText('total_weight')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('payment_terms')->nullable();
            $table->longText('refunds')->nullable();
            /********************************************** */
            $table->longText('paid_at')->nullable();
            $table->longText('fulfilled_at')->nullable();
            $table->text('accepts_marketing')->nullable();
            $table->longText('shipping_price')->nullable();
            $table->longText('discount_code')->nullable();
            $table->longText('discount_amount')->nullable();
            $table->longText('shipping_method')->nullable();
            $table->longText('lineitem_quantity')->nullable();
            $table->longText('lineitem_name')->nullable();
            $table->longText('lineitem_price')->nullable();
            $table->longText('lineitem_compare_at_price')->nullable();
            $table->longText('lineitem_sku')->nullable();
            $table->longText('lineitem_requires_shipping')->nullable();
            $table->text('lineitem_taxable')->nullable();
            $table->text('lineitem_fulfillment_status')->nullable();
            $table->text('billing_name')->nullable();
            $table->text('billing_street')->nullable();
            $table->longText('billing_address_1')->nullable();
            $table->longText('billing_address_2')->nullable();
            $table->text('billing_company')->nullable();
            $table->text('billing_city')->nullable();
            $table->text('billing_zip')->nullable();
            $table->text('billing_province')->nullable();
            $table->text('billing_country')->nullable();
            $table->text('billing_phone')->nullable();
            $table->text('shipping_name')->nullable();
            $table->text('shipping_street')->nullable();
            $table->longText('shipping_address_1')->nullable();
            $table->longText('shipping_address_2')->nullable();
            $table->text('shipping_company')->nullable();
            $table->text('shipping_city')->nullable();
            $table->text('shipping_zip')->nullable();
            $table->text('shipping_province')->nullable();
            $table->text('shipping_country')->nullable();
            $table->text('shipping_phone')->nullable();
            $table->longText('note_attributes')->nullable();

            $table->text('payment_method')->nullable();
            $table->longText('payment_referance')->nullable();
            $table->longText('payment_amount')->nullable();
            $table->longText('refunded_amount')->nullable();
            $table->text('vendor')->nullable();
            $table->text('vendor_id')->nullable();
            $table->text('risk_level')->nullable();
            $table->text('lineitem_discount')->nullable();
            $table->text('tax_1_name')->nullable();
            $table->text('tax_1_value')->nullable();
            $table->text('tax_2_name')->nullable();
            $table->text('tax_2_value')->nullable();
            $table->text('tax_3_name')->nullable();
            $table->text('tax_3_value')->nullable();
            $table->text('tax_4_name')->nullable();
            $table->text('tax_4_value')->nullable();
            $table->text('tax_5_name')->nullable();
            $table->text('tax_5_value')->nullable();
            $table->longText('receipt_number')->nullable();
            $table->longText('duties')->nullable();
            $table->longText('billing_provience_name')->nullable();
            $table->longText('shipping_provience_name')->nullable();
            $table->longText('payment_id')->nullable();
            $table->longText('next_payment_due_at')->nullable();
            $table->longText('payment_referances')->nullable();
            $table->longText('created_at')->nullable();
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