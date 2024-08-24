<?php
namespace App\Http\Controllers;
use App\Models\Athlete;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
   public function store(Request $request)
   {
      $athlete = new Athlete();
      $athlete->name = $request->name;
      $athlete->isGirl = $request->isGirl == "on" ? true : false;

      $athlete->time100 = $request->time100;
      $athlete->time200 = $request->time200;
      $athlete->time300 = $request->time300;

      $time400 = ($request->minutes400 * 60) + $request->seconds400;
      $time500 = ($request->minutes500 * 60) + $request->seconds500;
      $time800 = ($request->minutes800 * 60) + $request->seconds800;
      $time1000 = ($request->minutes1000 * 60) + $request->seconds1000;
      $time1600 = ($request->minutes1600 * 60) + $request->seconds1600;
      $time3200 = ($request->minutes3200 * 60) + $request->seconds3200;
      $time5000 = ($request->minutes5000 * 60) + $request->seconds5000;

      $athlete->time400  = ($time400 != 0) ? $time400   : null;
      $athlete->time500  = ($time500 != 0) ? $time500   : null;
      $athlete->time800  = ($time800 != 0) ? $time800   : null;
      $athlete->time1000 = ($time1000 != 0) ? $time1000 : null;
      $athlete->time1600 = ($time1600 != 0) ? $time1600 : null;
      $athlete->time3200 = ($time3200 != 0) ? $time3200 : null;
      $athlete->time5000 = ($time5000 != 0) ? $time5000 : null;

      if($athlete->save()){
         return redirect()->back()->with('success', "Athlete '$request->name' created successfully.");
      }
      else {
         return redirect()->back()->with('danger', "Error creating athlete '$request->name'. Ask Kilian.");
      }
   }
   public function modify(Request $request)
   {
      $athlete = Athlete::where('id', '=', $request->id)->first();
      $athlete->name = $request->name;
      $athlete->isGirl = $request->isGirl == "on" ? true : false;

      $athlete->time100 = $request->time100;
      $athlete->time200 = $request->time200;
      $athlete->time300 = $request->time300;

      $time400 = ($request->minutes400 * 60) + $request->seconds400;
      $time500 = ($request->minutes500 * 60) + $request->seconds500;
      $time800 = ($request->minutes800 * 60) + $request->seconds800;
      $time1000 = ($request->minutes1000 * 60) + $request->seconds1000;
      $time1600 = ($request->minutes1600 * 60) + $request->seconds1600;
      $time3200 = ($request->minutes3200 * 60) + $request->seconds3200;
      $time5000 = ($request->minutes5000 * 60) + $request->seconds5000;

      $athlete->time400  = ($time400 != 0) ? $time400   : null;
      $athlete->time500  = ($time500 != 0) ? $time500   : null;
      $athlete->time800  = ($time800 != 0) ? $time800   : null;
      $athlete->time1000 = ($time1000 != 0) ? $time1000 : null;
      $athlete->time1600 = ($time1600 != 0) ? $time1600 : null;
      $athlete->time3200 = ($time3200 != 0) ? $time3200 : null;
      $athlete->time5000 = ($time5000 != 0) ? $time5000 : null;

      if($athlete->save()){
         return redirect()->back()->with('success', "Athlete '$request->name''s times updated successfully.");
      }
      else {
         return redirect()->back()->with('danger', "Error editing athlete '$request->name'. Ask Kilian.");
      }
   }

   public function update(Request $request, Athlete $athlete)
   {
       if($athlete->fill($request->all())->save()){
           return true;
       }
   }

   public function getAll()
   {
      $all_athletes = Athlete::all();
      return $all_athletes;
   }

   public function destroy($id)
   {

      $athlete = Athlete::where('id', '=', $id)->first();

      if($athlete->delete()){
         return redirect()->back()->with('success', "Athlete deleted successfully.");
      }
      else {
         return redirect()->back()->with('danger', "Error deleting athlete. Ask Kilian.");
      }
   }

   public function edit($id)
   {
      $athlete = Athlete::where('id', '=', $id)->first();

      return view('edit-athlete')->with('athlete', $athlete);
   }

   public function manageAthletes()
   {
      return view('athletes')->with('athletes', Athlete::all());
   }

   public function addAthlete()
   {
      return view('add-athlete');
   }
}