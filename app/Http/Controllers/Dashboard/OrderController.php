<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

    public function index()
    {

        $responses = Http::get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250');
        if ($responses->ok()) {
            foreach ($responses['orders'] as $response) {
                $order = DB::table('orders')->where('order_id', $response['id'])->first();
                if (!$order) {
                    DB::table('orders')->insert([
                        'order_id' => $response['id'],
                        'admin_graphql_api_id' => $response['admin_graphql_api_id'] ?? null,
                        'app_id' => $response['app_id'] ?? null,
                        'browser_ip' => $response['browser_ip'] ?? null,
                        'buyer_accepts_marketing' => $response['buyer_accepts_marketing'] ?? null,
                        'cancel_reason' => $response['cancel_reason'] ?? null,
                        'cancelled_at' => $response['cancelled_at'] ?? null,
                        'cart_token' => $response['cart_token'] ?? null,
                        'checkout_id' => $response['checkout_id'] ?? null,
                        'checkout_token' => $response['checkout_token'] ?? null,
                        'closed_at' => $response['closed_at'] ?? null,
                        'confirmed' => $response['confirmed'] ?? null,
                        'contact_email' => $response['contact_email'] ?? null,
                        'currency' => $response['currency'] ?? null,
//                        'tracking_number' =>  array_key_exists('tracking_number',$response['fulfillments']) == true ? $response['fulfillments']['tracking_number'] : null ,
                        'current_subtotal_price' => $response['current_subtotal_price'] ?? null,
                        'current_total_discounts' => $response['current_total_discounts'] ?? null,
                        'current_total_duties_set' => $response['current_total_duties_set'] ?? null,
                        'current_total_tax' => $response['current_total_tax'] ?? null,
                        'customer_locale' => $response['customer_locale'] ?? null,
                        'device_id' => $response['device_id'] ?? null,
                        'email' => $response['email'] ?? null,
                        'estimated_taxes' => $response['estimated_taxes'] ?? null,
                        'financial_status' => $response['financial_status'] ?? null,
                        'fulfillment_status' => $response['fulfillment_status'] ?? null,
                        'gateway' => $response['gateway'] ?? null,
                        'landing_site' => $response['landing_site'] ?? null,
                        'landing_site_ref' => $response['landing_site_ref'] ?? null,
                        'location_id' => $response['location_id'] ?? null,
                        'merchant_of_record_app_id' => $response['merchant_of_record_app_id'] ?? null,
                        'name' => $response['name'] ?? null,
                        'note' => $response['note'] ?? null,
                        'number' => $response['number'] ?? null,
                        'order_number' => $response['order_number'] ?? null,
                        'order_status_url' => $response['order_status_url'] ?? null,
                        'original_total_duties_set' => $response['original_total_duties_set'] ?? null,
//                        'payment_gateway_names' => explode(',',$response['payment_gateway_names'])  ?? null,
                        'phone' => $response['phone'] ?? null,
                        'presentment_currency' => $response['presentment_currency'] ?? null,
                        'processed_at' => $response['processed_at'] ?? null,
                        'processing_method' => $response['processing_method'] ?? null,
                        'reference' => $response['reference'] ?? null,
                        'referring_site' => $response['referring_site'] ?? null,
                        'source_identifier' => $response['source_identifier'] ?? null,
                        'source_name' => $response['source_name'] ?? null,
                        'source_url' => $response['source_url'] ?? null,
                        'subtotal_price' => $response['subtotal_price'] ?? null,
                        'tags' => $response['tags'] ?? null,
//                        'tax_lines' => $response['tax_lines'] ?? null,
                        'taxes_included' => $response['taxes_included'] ?? null,
                        'test' => $response['test'] ?? null,
                        'token' => $response['token'] ?? null,
                        'total_discounts' => $response['total_discounts'] ?? null,
                        'total_line_items_price' => $response['total_line_items_price'] ?? null,
                        'total_price' => $response['total_price'] ?? null,
                        'total_tax' => $response['total_tax'] ?? null,
                        'total_tip_received' => $response['total_tip_received'] ?? null,
                        'total_weight' => $response['total_weight'] ?? null,
                        'user_id' => $response['user_id'] ?? null,
//                        'payment_terms' => $response['payment_terms'] ?? null,
//                        'refunds' => $response['refunds'] ?? null,
                    ]);
                }
            }
            return "ok";
        } else {
            return "No";
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response = Http::get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders/' . $id . '.json');

        if ($response->ok()) {
            $order = DB::table('orders')->where('order_id', $response['order']['id'])->first();
            DB::table('orders')->where('order_id', $response['order']['id'])->update([
                'financial_status' => $response['order']['financial_status'] ?? null,
                'fulfillment_status' => $response['order']['fulfillment_status'] ?? null,
            ]);


            $updateOrCreateOrderDetails = DB::table('order_details')->where('order_id', $order->id)->first();
            if ($updateOrCreateOrderDetails) {
                $updateOrCreateOrderDetails->tracking_number = $response['order']['fulfillments'][0]['tracking_number'];
                $updateOrCreateOrderDetails->save();
            } else {
                DB::table('order_details')->insert([
                    'order_id' => $order->id,
                    'tracking_number' => $response['order']['fulfillments'][0]['tracking_number'],
                ]);
            }


        }
        return "ok";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
