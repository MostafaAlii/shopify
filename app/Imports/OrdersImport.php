<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrdersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $orderData)
    {
        return new Order([
            "name" => $orderData['name'],
            "email" => $orderData['email'],
            "financial_status" => $orderData['financial_status'],
            "paid_at" => $orderData['paid_at'],
            "fulfillment_status" => $orderData['fulfillment_status'],
            "fulfilled_at" => $orderData['fulfilled_at'],
            "accepts_marketing" => $orderData['accepts_marketing'],
            "currency" => $orderData['currency'],
            "subtotal_price" => $orderData['subtotal'],
            "shipping_price" => $orderData['shipping'],
            "total_tax" => $orderData['taxes'],
            "total_price" => $orderData['total'],

            "discount_code" => $orderData['discount_code'],
            "discount_amount" => $orderData['discount_amount'],
            "shipping_method" => $orderData['shipping_method'],
            "created_at" => $orderData['created_at'],
            "lineitem_quantity" => $orderData['lineitem_quantity'],
            "lineitem_name" => $orderData['lineitem_name'],
            "lineitem_price" => $orderData['lineitem_price'],
            "lineitem_compare_at_price" => $orderData['lineitem_compare_at_price'],
            "lineitem_sku" => $orderData['lineitem_sku'],
            "lineitem_requires_shipping" => $orderData['lineitem_requires_shipping'],
            "lineitem_taxable" => $orderData['lineitem_taxable'],
            "lineitem_fulfillment_status" => $orderData['lineitem_fulfillment_status'],
            "billing_name" => $orderData['billing_name'],
            "billing_street" => $orderData['billing_street'],
            "billing_address_1" => $orderData['billing_address1'],
            "billing_address_2" => $orderData['billing_address2'],
            "billing_company" => $orderData['billing_company'],

            "billing_city" => $orderData['billing_city'],
            "billing_zip" => $orderData['billing_zip'],
            "billing_province" => $orderData['billing_province'],
            "billing_country" => $orderData['billing_country'],
            "billing_phone" => $orderData['billing_phone'],
            "shipping_name" => $orderData['shipping_name'],
            "shipping_street" => $orderData['shipping_street'],
            "shipping_address_1" => $orderData['shipping_address1'],
            "shipping_address_2" => $orderData['shipping_address2'],
            "shipping_company" => $orderData['shipping_company'],
            "shipping_city" => $orderData['shipping_city'],
            "shipping_zip" => $orderData['shipping_zip'],
            "shipping_province" => $orderData['shipping_province'],
            "shipping_country" => $orderData['shipping_country'],
            "shipping_phone" => $orderData['shipping_phone'],
            "note" => $orderData['notes'],

            "note_attributes" => $orderData['note_attributes'],
            "cancelled_at" => $orderData['cancelled_at'],
            "payment_method" => $orderData['payment_method'],
            "payment_referance" => $orderData['payment_reference'],
            "refunded_amount" => $orderData['refunded_amount'],
            "vendor" => $orderData['vendor'],
            "vendor_id" => $orderData['id'],
            "tags" => $orderData['tags'],
            "risk_level" => $orderData['risk_level'],
            "source_name" => $orderData['source'],
            "lineitem_discount" => $orderData['lineitem_discount'],
            "tax_1_name" => $orderData['tax_1_name'],
            "tax_1_value" => $orderData['tax_1_value'],
            "tax_2_name" => $orderData['tax_2_name'],
            "tax_2_value" => $orderData['tax_2_value'],
            "tax_3_name" => $orderData['tax_3_name'],
            "tax_3_value" => $orderData['tax_3_value'],
            "tax_4_name" => $orderData['tax_4_name'],
            "tax_4_value" => $orderData['tax_4_value'],
            "tax_5_name" => $orderData['tax_5_name'],
            "tax_5_value" => $orderData['tax_5_value'],
            "phone" => $orderData['phone'],
            "receipt_number" => $orderData['receipt_number'],
            "duties" => $orderData['duties'],
            "billing_provience_name" => $orderData['billing_province_name'],
            "shipping_provience_name" => $orderData['shipping_province_name'],
            "payment_id" => $orderData['payment_id'],
            "payment_terms" => $orderData['payment_terms_name'],
            "next_payment_due_at" => $orderData['next_payment_due_at'],
            "payment_referances" => $orderData['payment_references'],
        ]);
    }
}