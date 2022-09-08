<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Room;
use App\Booking;
use App\Building;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ======================================================
        // ======================== USER ========================
        // ======================================================

        $user = [
            [
                'id' => '1',
                'name' => 'Admin',
                'last_name' => 'Admin',
                'roles' => 'admin',
                'position' => 'staff',
                'email' => 'admin@telkomuniversity.com',
                'phone_number' => '08123456789',
                'password' => 'password',
            ],
            [
                'id' => '2',
                'name' => 'example-student',
                'last_name' => 'example-student',
                'roles' => 'user',
                'position' => 'student',
                'email' => 'student@telkomuniversity.com',
                'phone_number' => '08123456790',
                'password' => 'password',
            ],
            [
                'id' => '3',
                'name' => 'example-lecturer',
                'last_name' => 'example-lecturer',
                'roles' => 'user',
                'position' => 'lecturer',
                'email' => 'lecturer@telkomuniversity.com',
                'phone_number' => '08123456791',
                'password' => 'password',
            ],
            [
                'id' => '4',
                'name' => 'example-rector',
                'last_name' => 'example-rector',
                'roles' => 'user',
                'position' => 'rector',
                'email' => 'rector@telkomuniversity.com',
                'phone_number' => '08123456792',
                'password' => 'password',
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        // ======================================================
        // ======================= BUILDING =====================
        // ======================================================

        $buildings = [
            [
                'id' => '1',
                'name' => 'TULT',
                'image' => 'Please Update!',
                'facility' => 'Please Update!',
            ],
            [
                'id' => '2',
                'name' => 'GKU',
                'image' => 'Please Update!',
                'facility' => 'Please Update!',
            ]
        ];

        foreach ($buildings as $key => $value) {
            Building::create($value);
        }

        // ======================================================
        // ======================== ROOM ========================
        // ======================================================

        $room = [
            [
                'id' => '1',
                'id_building' => '1',
                'room_number' => '101',
                'type' => 'class',
                'capacity' => '10',
                'facility' => 'Excepteur duis accus',
                'status' => 'not_used',
            ],
            [
                'id' => '2',
                'id_building' => '2',
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

        // ======================================================
        // ======================= BOOKING ======================
        // ======================================================

        $booking = [
            [
                'id' => '1',
                'id_user' => '2',
                'id_room' => '1',
                'id_building' => '1',
                'date' => now(),
                'time' => '1',
                'lecturer_code' => "FRI",
                'used' => "Kelas pengganti",
                'status' => 'pending',
            ],
            [
                'id' => '2',
                'id_user' => '3',
                'id_room' => '1',
                'id_building' => '1',
                'date' => now(),
                'time' => '1',
                'lecturer_code' => "FRI",
                'used' => "Kelas pengganti dua",
                'status' => 'pending',
            ],
            [
                'id' => '3',
                'id_user' => '4',
                'id_room' => '2',
                'id_building' => '2',
                'date' => now(),
                'time' => '1',
                'lecturer_code' => "FRI",
                'used' => "Rapat UKM",
                'status' => 'pending',
            ]
        ];

        foreach ($booking as $key => $value) {
            Booking::create($value);
        }

    }
}
