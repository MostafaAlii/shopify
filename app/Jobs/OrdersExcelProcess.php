<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class OrdersExcelProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public function __construct(public $orderData) {
        $this->orderData = $orderData;
        //dd($this->orderData);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        foreach ($this->orderData as $orderData) {
            $order = new Order();
            $order->name = $orderData['Name'];
            $order->email = $orderData['Email'];
            $order->financial_status = $orderData['Financial Status'];
            $order->paid_at = $orderData['Paid at'];
            $order->fulfillment_status = $orderData['Fulfillment Status'];
            $order->fulfilled_at = $orderData['Fulfilled at'];
            $order->accepts_marketing = $orderData['Accepts Marketing'];
            $order->currency = $orderData['Currency'];
            $order->subtotal_price = $orderData['Subtotal'];
            $order->shipping_price = $orderData['Shipping'];
            $order->total_tax = $orderData['Taxes'];
            $order->total_price = $orderData['Total'];
            $order->discount_code = $orderData['Discount Code'];
            $order->discount_amount = $orderData['Discount Amount'];
            $order->shipping_method = $orderData['Shipping Method'];
            $order->created_at = $orderData['Created at'];
            $order->lineitem_quantity = $orderData['Lineitem quantity'];
            $order->lineitem_name = $orderData['Lineitem name'];
            $order->lineitem_price = $orderData['Lineitem price'];
            $order->lineitem_compare_at_price = $orderData['Lineitem compare at price'];
            $order->lineitem_sku = $orderData['Lineitem sku'];
            $order->lineitem_requires_shipping = $orderData['Lineitem requires shipping'];
            $order->lineitem_taxable = $orderData['Lineitem taxable'];
            $order->lineitem_fulfillment_status = $orderData['Lineitem fulfillment status'];
            $order->billing_name = $orderData['Billing Name'];
            $order->billing_street = $orderData['Billing Street'];
            $order->billing_address_1 = $orderData['Billing Address1'];
            $order->billing_address_2 = $orderData['Billing Address2'];
            $order->billing_company = $orderData['Billing Company'];
            $order->billing_city = $orderData['Billing City'];
            $order->billing_zip = $orderData['Billing Zip'];
            $order->billing_province = $orderData['Billing Province'];
            $order->billing_country = $orderData['Billing Country'];
            $order->billing_phone = $orderData['Billing Phone'];
            $order->shipping_name = $orderData['Shipping Name'];
            $order->shipping_street = $orderData['Shipping Street'];
            $order->shipping_address_1 = $orderData['Shipping Address1'];
            $order->shipping_address_2 = $orderData['Shipping Address2'];
            $order->shipping_company = $orderData['Shipping Company'];
            $order->shipping_city = $orderData['Shipping City'];
            $order->shipping_zip = $orderData['Shipping Zip'];
            $order->shipping_province = $orderData['Shipping Province'];
            $order->shipping_country = $orderData['Shipping Country'];
            $order->shipping_phone = $orderData['Shipping Phone'];
            $order->note = $orderData['Notes'];
            $order->note_attributes = $orderData['Note Attributes'];
            $order->cancelled_at = $orderData['Cancelled at'];
            $order->payment_method = $orderData['Payment Method'];
            $order->payment_referance = $orderData['Payment Reference'];
            $order->refunded_amount = $orderData['Refunded Amount'];
            $order->vendor = $orderData['Vendor'];
            $order->vendor_id = $orderData['Id'];
            $order->tags = $orderData['Tags'];
            $order->risk_level = $orderData['Risk Level'];
            $order->source_name = $orderData['Source'];
            $order->lineitem_discount = $orderData['Lineitem discount'];
            $order->tax_1_name = $orderData['Tax 1 Name'];
            $order->tax_1_value = $orderData['Tax 1 Value'];
            $order->tax_2_name = $orderData['Tax 2 Name'];
            $order->tax_2_value = $orderData['Tax 2 Value'];
            $order->tax_3_name = $orderData['Tax 3 Name'];
            $order->tax_3_value = $orderData['Tax 3 Value'];
            $order->tax_4_name = $orderData['Tax 4 Name'];
            $order->tax_4_value = $orderData['Tax 4 Value'];
            $order->tax_5_name = $orderData['Tax 5 Name'];
            $order->tax_5_value = $orderData['Tax 5 Value'];
            $order->phone = $orderData['Phone'];
            $order->receipt_number = $orderData['Receipt Number'];
            $order->duties = $orderData['Duties'];
            $order->billing_provience_name = $orderData['Billing Province Name'];
            $order->shipping_provience_name = $orderData['Shipping Province Name'];
            $order->payment_id = $orderData['Payment ID'];
            $order->payment_terms = $orderData['Payment Terms Name'];
            $order->next_payment_due_at = $orderData['Next Payment Due At'];
            $order->payment_referances = $orderData['Payment References'];
            $order->save();
        }
    }
}