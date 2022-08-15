<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Room;
use App\Booking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'id' => '1',
                'name' => 'Admin',
                'last_name' => 'Admin',
                'roles' => 'admin',
                'email' => 'admin@telkomuniversity.com',
                'password' => 'password',
            ],
            [
                'id' => '2',
                'name' => 'example-customer',
                'last_name' => 'example-customer',
                'roles' => 'customer',
                'email' => 'customer@telkomuniversity.com',
                'password' => 'password',
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        $room = [
            [
                'id' => '1',
                'room_number' => '101',
                'type' => 'class',
                'capacity' => '10',
                'facility' => 'Excepteur duis accus',
                'status' => 'not_used',
            ],
            [
                'id' => '2',
                'room_number' => '102',
                'type' => 'class',
                'capacity' => '5',
                'facility' => 'GG',
                'status' => 'not_used',
            ]
        ];

        foreach ($room as $key => $value) {
            Room::create($value);
        }

        $booking = [
            [
                'id' => '1',
                'id_users' => '2',
                'id_room' => '1',
                'start_date' => now(),
                'end_date' => now(),
                'lecturer_code' => "FRI",
                'phone_number' => '08123456789',
                'status' => 'accept',
            ],
            [
                'id' => '2',
                'id_users' => '2',
                'id_room' => '2',
                'start_date' => now(),
                'end_date' => now(),
                'lecturer_code' => "FRI",
                'phone_number' => '08123456789',
                'status' => 'pending',
            ]
        ];

        foreach ($booking as $key => $value) {
            Booking::create($value);
        }

    }
}
