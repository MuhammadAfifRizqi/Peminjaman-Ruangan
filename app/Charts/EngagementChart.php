<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Booking;

class EngagementChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $bookings = [];
        $bookings_name = [];

        for ($day = 0; $day < 7; $day++) {
            $date = Carbon::now()->subDay($day);

            if ($day == 0) {
                $bookings_temp = Booking::whereDay('created_at', '>=', $date)->count();
            } else {
                $bookings_temp = Booking::whereDay('created_at', $date->day)->count();
            }

            array_push($bookings, $bookings_temp);
            array_push($bookings_name, $date->format('l'));
        }

        $bookings = array_reverse($bookings);

        return $this->chart->areaChart()
            ->setTitle('Last 7 Days Booking.')
            ->addData('Total Booking', $bookings)
            ->setXAxis($bookings_name);
    }
}
