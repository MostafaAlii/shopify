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
            if ($response->ok()) {
                if (isset($response['orders'][0]['fulfillments']) && !empty($response['orders'][0]['fulfillments'])) {
                    DB::table('orders')->where('id', $order->id)->whereNull('order_id')->update([
                        'order_id' =>  $response['orders'][0]['id'],
                        'tracking_number' => $response['orders'][0]['fulfillments'][0]['tracking_number'],
                    ]);

                    $order_tracking_number = DB::table('order_details')->where('order_id', $order->id)->whereNotNull('tracking_number')->first();

                    if (!$order_tracking_number) {
                        DB::table('order_details')->insert([
                            'order_id' => $order->id,
                            'tracking_number' => $response['orders'][0]['fulfillments'][0]['tracking_number'],
                        ]);
                    }
                }
            }
        }
    }
}
