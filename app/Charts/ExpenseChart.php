<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Room;
use App\Booking;
use App\Building;
use Illuminate\Support\Facades\DB;

class ExpenseChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $bookings = Booking::groupBy('id_building')->select('id_building', DB::raw('count(*) as total'))->limit(5)->get();
        $data = [];
        $name = [];

        foreach ($bookings as $bk){
            array_push($data, $bk->total);
            $building = Building::find($bk->id_building);
            array_push($name,$building->name);
        }
        return $this->chart->pieChart()
            ->setTitle('Top 5 Building')
            ->addData($data)
            ->setLabels($name);
    }
}
