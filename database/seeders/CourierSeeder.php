<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courier;

class CourierSeeder extends Seeder
{
    public function run()
    {
        Courier::create([
            'order_id' => 'erfy',
            'status' => 'Order Confirmed',
            'sender_id' => 'Binay',
            'receiver_name' => 'Remo',
            'receiver_email' => 'remo@gmail.com',
            'receiver_phone' => '9800010101',
            'sender_address' => 'Gaindakot-1',
            'receiver_address' => 'Pokhara Lakeside',
            'destination' => 'Pokhara',
            'weight' => 100,
            'dimensions' => '30x40',
            'package_type' => 'Box',
            'special_instructions' => 'Handle with care',
            'expected_delivery_date' => '2024-07-27',
            'date_shipped' => '2024-07-20'
        ]);

        // Add more sample entries if needed
    }
}

