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
            $response = Http::get(RouteServiceProvider::SHOPIFYURL . '/admin/api/2022-10/orders/' . $order->order_id . '.json');
            if ($response->ok()) {
                if (isset($response['order']['fulfillments']) && !empty($response['order']['fulfillments'])) {
                    $order_tracking_number = DB::table('order_details')->where('order_id', $order->id)->whereNotNull('tracking_number')->first();

                    if (!$order_tracking_number) {
                        DB::table('order_details')->insert([
                            'order_id' => $order->id,
                            'tracking_number' => $response['order']['fulfillments'][0]['tracking_number'],
                        ]);
                    }
                }
            }
        }
    }
}
