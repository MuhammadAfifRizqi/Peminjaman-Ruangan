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


        // $category = [
        //     [
        //         'name' => 'Rice',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Meatballs',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Soto',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Noodle',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Satay',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Seafood',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Chicken',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Duck',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Beef',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Pork',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Martabak',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Drink',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Food',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Coffee',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Dessert',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Bread',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Cake',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Boba',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Snack',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Sweet Dish',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Italian Cuisine',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Japanese Cuisine',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Indian Cuisine',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Korean Cuisine',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Chinese Cuisine',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Thai Cuisine',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Western  Cuisine',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Fried Chicken',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Burger',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Pizza',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Pasta',
        //         'photo' => 'null',
        //     ],
        //     [
        //         'name' => 'Others',
        //         'photo' => 'null',
        //     ],
        // ];

        // foreach ($category as $key => $value) {
        //     Category::create($value);
        // }
    }
}
