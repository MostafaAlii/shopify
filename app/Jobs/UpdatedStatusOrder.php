<?php

namespace App\Jobs;

use App\Providers\RouteServiceProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UpdatedStatusOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order_id;
    public $priority = 10;

    public function __construct($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach ($this->order_id as $order) {

            $response = Http::get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders.json?name=' . substr($order->name, 1));

            if ($response->ok() && !empty($response['orders'])) {
                DB::table('orders')->where('name', $response['orders'][0]['name'])->update([
                    'financial_status' => $response['orders'][0]['financial_status'],
                    'fulfillment_status' => $response['orders'][0]['fulfillment_status'],
                    'order_id' => $response['orders'][0]['id'],
                ]);

                if (isset($response['orders'][0]['fulfillments'][0])) {
                    DB::table('orders')->where('name', $response['orders'][0]['name'])->update([
                        'tracking_number' => $response['orders'][0]['fulfillments'][0]['tracking_number'],
                    ]);

                }
            }
        }
    }
}
