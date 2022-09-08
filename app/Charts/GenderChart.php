<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Room;
use App\Booking;
use Illuminate\Support\Facades\DB;

class GenderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $bookings = Booking::groupBy('id_room')->select('id_room', DB::raw('count(*) as total'))->limit(5)->get();
        $data = [];
        $name = [];

        foreach ($bookings as $bk){
            array_push($data, $bk->total);
            $room = Room::find($bk->id_room);
            array_push($name,$room->room_number);
        }


        return $this->chart->pieChart()
            ->setTitle('Top 5 Room')
            ->addData($data)
            ->setLabels($name);
    }
}
