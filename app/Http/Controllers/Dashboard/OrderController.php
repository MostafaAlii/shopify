<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use App\DataTables\OrderDatatable;
use App\DataTables\OrderStatusDataTable;

class OrderController extends Controller
{

    public function index(OrderDatatable $dataTable) {
        return $dataTable->render('dashboard.orders.index', ['pageTitle' => 'الطلبات', 'status' => 'كل الطلبات']);
    }
    public function orders_updated() {
        $responses = Http::pool(fn(Pool $pool) => [
//            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250'),
        ]);
        if ($responses[0]->ok()) {
            foreach (array_merge($responses[0]['orders']) as $response) {
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
            return redirect()->back()->with('success', 'Orders synced successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }



    public function orderSync() {
        $responses = Http::pool(fn(Pool $pool) => [
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?status=any'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&since_id=1'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&status=open'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&status=closed'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&status=cancelled'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&status=any'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&fulfillment_status=any'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&fulfillment_status=shipped'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&fulfillment_status=partial'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&fulfillment_status=unshipped'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&fulfillment_status=unfulfilled'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&financial_status=authorized'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&financial_status=pending'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&financial_status=paid'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&financial_status=partially_paid'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&financial_status=refunded'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&financial_status=voided'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&financial_status=partially_refunded'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&financial_status=any'),
            $pool->get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?limit=250&financial_status=unpaid'),
        ]);
        if ($responses[0]->ok() && $responses[1]->ok() && $responses[2]->ok() && $responses[3]->ok() && $responses[4]->ok() && $responses[5]->ok() && $responses[6]->ok() && $responses[7]->ok() && $responses[8]->ok() && $responses[9]->ok() && $responses[10]->ok() && $responses[11]->ok() && $responses[12]->ok() && $responses[1]->ok() && $responses[14]->ok() && $responses[15]->ok() && $responses[16]->ok() && $responses[17]->ok() && $responses[18]->ok() && $responses[19]->ok() && $responses[20]->ok() && $responses[21]->ok()) {
            foreach (array_merge($responses[0]['orders'], $responses[1]['orders'], $responses[2]['orders'], $responses[3]['orders'], $responses[4]['orders'], $responses[5]['orders'], $responses[6]['orders'], $responses[7]['orders'], $responses[8]['orders'], $responses[9]['orders'], $responses[10]['orders'], $responses[11]['orders'], $responses[12]['orders'], $responses[13]['orders'], $responses[14]['orders'], $responses[15]['orders'], $responses[16]['orders'], $responses[17]['orders'], $responses[18]['orders'], $responses[19]['orders'] , $responses[20]['orders'], $responses[21]['orders']) as $response) {
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
            return redirect()->back()->with('success', 'Orders synced successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($order_id)
    {
        //$order = DB::table('orders')->where('order_id', $order_id)->first();
        $order = Order::where('order_id', $order_id)->with('order_details')->first();
        $response = Http::get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders/' . $order_id . '.json');
//        return $response;
        if ($response->status() == 200) {
            $order = DB::table('orders')->where('order_id', $response['order']['id'])->first();
            DB::table('orders')->where('order_id', $response['order']['id'])->update([
                'financial_status' => $response['order']['financial_status'] ?? null,
                'fulfillment_status' => $response['order']['fulfillment_status'] ?? null,
            ]);
            $updateOrCreateOrderDetails = DB::table('order_details')->where('order_id', $order_id)->first();
            $tracking_number = null;

            if (isset($response['order']['fulfillments']) && !empty($response['order']['fulfillments'])) {
                $tracking_number = $response['order']['fulfillments'][0]['tracking_number'] ?? null;
            }
            if ($updateOrCreateOrderDetails) {
                DB::table('order_details')->where('order_id', $order->id)->update([
                    'tracking_number' => $tracking_number
                ]);
            } else {
                DB::table('order_details')->insert([
                    'order_id' => $order->id,
                    'tracking_number' => $tracking_number,
                ]);
            }
            return view('dashboard.orders.show', ['order' => $order, 'response' => $response]);
        }
        //return view('dashboard.orders.show', ['order' => $order, 'response' => $response]);
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

    public function getOrderByStatus(OrderStatusDataTable $dataTable) {
        $status = request()->segment(count(request()->segments()));
        return $dataTable->render('dashboard.orders.index', ['status' => ucfirst($status), 'pageTitle' => 'الطلبات']);
    }
}
