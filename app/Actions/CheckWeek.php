<?php
 namespace App\Actions;

use App\Models\Week;
use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;

 class CheckWeek{

    public static function handle(){
        $en = CarbonImmutable::now()->locale('en_US');
        $start = $en->startOfWeek(Carbon::MONDAY)->format("Y-m-d");
        $end = $en->endOfWeek(Carbon::SUNDAY)->format("Y-m-d");
        $weeknumber = $en->week();
       // dd(Carbon::parse($start)->subDays(7)->format("Y-m-d"));

        $lastDayOfCurrentWeek="";

        $week= Week::Where('from','=',$start)->count();
        if(!$week){
            $week= Week::create([
                'label'=> $weeknumber ,
                'from'=> $start,
                'to'=> $end ,
            ]);
        }

        //ddd($week);

    }

 }
