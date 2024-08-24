<?php
namespace App\Http\Controllers;
use App\Models\Athlete;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
   public function new()
   {
      $athletes = Athlete::all();

      return view('new-workout')->with('athletes', $athletes);
   }

   public function build(request $request)
   {
      // dd($request);

      $athlete_data = collect([]);

      foreach($request->athletes as $athlete)
      {
         $data = Athlete::find($athlete);
         $athlete_data->push($data);
      }

      //Determine ratio - set to 1 by default
      $pace_ratio1 = 1;
      $pace_distance = $request->pace_distance;
      $distance = $request->distance;

      switch($request->pace_select) 
      {
         case("tempo"):
            $pace_ratio = 1.26;
            break;
         case("cv"):
            $pace_ratio = 1.18;
            break;
         case("aerobic-power"):
            $pace_ratio = 1.1;
            break;
         case("vo2-max"):
            $pace_ratio = 1.05;
            break;
         default:
            $pace_ratio = 1.0;
            break;
      }

      // dd($athlete_data);

      $athlete_calculated_times = collect([]);

      foreach($athlete_data as $athlete)
      {
         $calculated_time = 0;
         $meters_per_second = 0;

         // This should really be cleaned up at some point
         if($pace_distance == "800" && !is_null($athlete->time800))
         {
            $meters_per_second = ($athlete->time800 / 800);
         }
         else if($pace_distance == "1600" && !is_null($athlete->time1600))
         {
            $meters_per_second = ($athlete->time1600 / 1600);
         }
         else if($pace_distance == "3200" && !is_null($athlete->time3200))
         {
            $meters_per_second = ($athlete->time3200 / 3200);
         }
         else if($pace_distance == "5000" && !is_null($athlete->time5000))
         {
            $meters_per_second = ($athlete->time5000 / 5000);
         }
         else if($pace_distance == "200" && !is_null($athlete->time200))
         {
            $meters_per_second = ($athlete->time5000 / 5000);
         }
         else if($pace_distance == "400" && !is_null($athlete->time400))
         {
            $meters_per_second = ($athlete->time5000 / 5000);
         }
         else
         {
            if(!is_null($athlete->time1000))
            {$meters_per_second = ($athlete->time1000 / 1000);}
            else if(!is_null($athlete->time1600))
            {$meters_per_second = ($athlete->time1600 / 1600);}
            else if(!is_null($athlete->time3200))
            {$meters_per_second = ($athlete->time3200 / 3200);}
            else if(!is_null($athlete->time5000))
            {$meters_per_second = ($athlete->time5000 / 5000);}
            if(!is_null($athlete->time100))
            {$meters_per_second = ($athlete->time100 / 100);}
            else if(!is_null($athlete->time200))
            {$meters_per_second = ($athlete->time200 / 200);}
            else if(!is_null($athlete->time300))
            {$meters_per_second = ($athlete->time300 / 300);}
            else if(!is_null($athlete->time400))
            {$meters_per_second = ($athlete->time400 / 400);}
            else if(!is_null($athlete->time500))
            {$meters_per_second = ($athlete->time500 / 500);}
            else if(!is_null($athlete->time800))
            {$meters_per_second = ($athlete->time800 / 800);}
         }

         $calculated_time = floor(($distance * $meters_per_second) * $pace_ratio);
         $calculated_time_clean = WorkoutController::format_seconds($calculated_time);


         $athlete_calculated_times->push([$athlete->name, $calculated_time_clean]);
         
      }

      // dd($athlete_calculated_times);

      return view('workout-results')->with('athlete_times', $athlete_calculated_times);

      // <option value="tempo">Tempo</option>
      // <option value="cv">CV</option>
      // <option value="aerobic-power">Aerobic Power</option>
      // <option value="vo2-max">V.O2 Max</option>
      // <option value="at-pace">At Pace</option>


   }

   function format_seconds($seconds) {
      $minutes = floor($seconds / 60);
      $seconds = $seconds % 60;
      return sprintf("%02d:%02d", $minutes, $seconds);
  }

}