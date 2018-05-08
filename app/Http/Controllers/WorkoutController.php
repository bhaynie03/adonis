<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exercise3;
use App\ExerciseType3;
use App\FibonacciSet3;
use App\Workout3;
use App\Indexes;
use App\Workout_Sessions;
use App\Workout_Sessions_Exercises_Normal;
use App\Workout_Sessions_Exercises_Fibonacci;
use App\AllWorkouts2;
use Auth;


class WorkoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    public function selection($value='')
    {
        $last_workout = "NA";
        $next_workout = "NA";

        $workouts = Workout3::get();
        $user_id = Auth::id();
        if(Workout_Sessions::where('user_id', $user_id)->exists()){
            // $last_workout = Workout_Sessions::where('user_id', $user_id)->orderBy('created_at', 'desc')->first();
            $all_workouts = Workout_Sessions::where('user_id', $user_id)->orderBy('created_at', 'asc')->get();
            foreach($all_workouts as $workout){
                if($workout->created_at !== $workout->endtime){
                    $last_workout = $workout;
                }
            }
            foreach($workouts as $workout){
                if($workout->name == $last_workout->workout_name){
                    $last_workout_id = $workout->id;
                }
            }
            $next_workout_id = $last_workout_id + 1;
            if(Workout3::where('id', $next_workout_id)->exists()){
               $next_workout = Workout3::where('id', $next_workout_id)->first(); 
            }
        }

        





    	$first = DB::table('exercise3s')->select('workout_name');
    	$exercises = DB::table('fibonacci_set3s')->select('workout_name')->union($first)->orderby('workout_name')->get();
    	return view('workouts.selection', compact('exercises', 'workouts', 'last_workout', 'next_workout'));
    }
    public function show($workout_name)
    {

    		$user_id = Auth::id();
  			$exercises = Exercise3::get();
  			$fSets = FibonacciSet3::get();
  			$eTypes = ExerciseType3::get();
    		$workout = Workout3::where('name', '=', $workout_name)->first();

    	return view ('workouts.preview', compact('workout', 'workout_name', 'exercises', 'fSets', 'eTypes', 'user_id'));
    }
    public function store($workout_name)
    {
    	$workout_sessions = new Workout_Sessions;

    	$workout_sessions->user_id = request('user_id');
    	$workout_sessions->workout_name = request('workout_name');
    	$workout_sessions->format_type = request('format_type');

    	$workout_sessions->save();
    	$tinkle = "/workoutSession/" . $workout_name;

    	return redirect($tinkle); 

    }
    public function interface($workout_name)
    {
    	  		$user_id = Auth::id();
				$exercises = Exercise3::get();
				$fSets = FibonacciSet3::get();
				$eTypes = ExerciseType3::get();
    	  		$workout = Workout3::where('name', '=', $workout_name)->first();

    	  	return view ('workouts.interface', compact('workout', 'workout_name', 'exercises', 'fSets', 'eTypes', 'user_id'));
    }
    public function update(Request $request, $workout_name)
    {
  		$user_id = Auth::id();
		$exercises = Exercise3::get();
		$fSets = FibonacciSet3::get();
		$eTypes = ExerciseType3::get();
  		$workout = Workout3::where('name', '=', $workout_name)->first();

    	$workout_sessions = Workout_Sessions::where([
    		['workout_name', '=', $workout_name],
    		['user_id', '=', $user_id],
    	])->latest()->first();
    	$workout_sessions->endtime = now();
    	$workout_sessions->notes = request( 'notes' );
    	$workout_sessions->save();

    	if($workout->format_type == 1){
    		foreach($exercises as $exercise){
    			if($exercise->workout_name == $workout->name){
    				foreach($eTypes as $et){
    					if ($et->id == $exercise->exercise_type){
    						$allWorkouts = new AllWorkouts2;
    						$allWorkouts->ws_id = $workout_sessions->id;
    						$allWorkouts->user_id = $user_id;
    						$allWorkouts->exercise_type = $exercise->exercise_type;
    						$allWorkouts->sets = $exercise->sets;
    						$allWorkouts->reps = $exercise->reps;
    						$allWorkouts->rest = $exercise->rest;
    						$allWorkouts->weight = request( $et->id );
                            $allWorkouts->format_type = $workout->format_type;
    						$allWorkouts->save();
    					}	
    				}
    			}
    		}
    	}elseif($workout->format_type == 2){
    		$set = 0;
    		foreach( $fSets as $fSet ){
    			if( $fSet->workout_name == $workout->name ){
    				foreach( $eTypes as $et){
    					if($et->id == $fSet->exercise_type){
    						$set = $set + 1;
    						$lightSet = "light_" . $set;
    						$moderateSet = "moderate_" . $set;
    						$moderate_heavySet = "moderate/heavy_" . $set;
    						$heavySet = "heavy_" . $set;

    						$allWorkouts = new AllWorkouts2;
    						$allWorkouts->ws_id = $workout_sessions->id;
    						$allWorkouts->user_id = $user_id;
    						$allWorkouts->exercise_type = $fSet->exercise_type;
    						$allWorkouts->initial_weight = $fSet->weight;
    						$allWorkouts->light_weight = request($lightSet);
    						$allWorkouts->moderate_weight = request($moderateSet);
    						$allWorkouts->moderate_heavy_weight = request($moderate_heavySet);
    						$allWorkouts->heavy_weight = request($heavySet);
                            $allWorkouts->format_type = $workout->format_type;
    						$allWorkouts->save();
    					}
    				}
    			}
    		}




    	}


    	return redirect ('/workouts');
    }
}
