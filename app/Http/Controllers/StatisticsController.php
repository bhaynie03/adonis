<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
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

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['welcome_page', 'about', 'reading', 'cat3'  ]);
    }

    public function index($value='')
    {

    	return view('statistics.index');
    }

    public function exercises($exercise_name)
    {	
    	$exercise_types = ExerciseType3::get();

    	$user_id = Auth::id();
    	$exercise_types = ExerciseType3::orderBy('name', 'asc')->get();
    	foreach($exercise_types as $et){
    		if ($et->name == $exercise_name){
    			$exercise_type = $et->id;
    		}
    	}
    	$exercises = Exercise3::latest()->get();
    	$first = Workout_Sessions_Exercises_Normal::select('id', 'ws_id', 'exercise_type', 'created_at')->where('user_id', $user_id)->where('exercise_type', $exercise_type );
    	// $allWorkouts = Workout_Sessions_Exercises_Fibonacci::select('id', 'ws_id', 'exercise_type', 'created_at')->where('user_id', $user_id)->where('exercise_type', $exercise_type )->union($first)->orderBy('created_at', 'desc')->get();
        
        $allWorkouts = AllWorkouts2::where('user_id', $user_id)->where('exercise_type', $exercise_type )->orderBy('created_at', 'desc')->Paginate(10);
    	$workout_sessions = Workout_Sessions::get();
    	$workout_sessions_exercises_normal = Workout_Sessions_Exercises_Normal::get();
    	$workout_sessions_exercises_fibonacci = Workout_Sessions_Exercises_Fibonacci::get();
        $max_normal_weight = Workout_Sessions_Exercises_Normal::where('user_id', $user_id)->where('exercise_type', $exercise_type)->max('weight');
        $max_fibonacci_weight = Workout_Sessions_Exercises_Fibonacci::where('user_id', $user_id)->where('exercise_type', $exercise_type)->max('heavy_weight');

        if(!empty($max_fibonacci_weight) and !empty($max_normal_weight)){
            if($max_normal_weight >= $max_fibonacci_weight){
                $max_weight = $max_normal_weight;
            }elseif($max_fibonacci_weight >= $max_normal_weight){
                $max_weight = $max_fibonacci_weight;
            }
        }elseif(!empty($max_normal_weight) and empty($max_fibonacci_weight)){
            $max_weight = $max_normal_weight;
        }elseif(empty($max_normal_weight) and !empty($max_fibonacci_weight)){
            $max_weight = $max_fibonacci_weight;
        }else{
            $max_weight = "NA";
        }





        // $maxN_id = Workout_Sessions_Exercises_Normal::where('user_id', $user_id)->where('exercise_type', $exercise_type)->where('weight', $max_normal_weight)->orderBy('created_at', 'desc')->first();
        // $maxF_id =  Workout_Sessions_Exercises_Fibonacci::where('user_id', $user_id)->where('exercise_type', $exercise_type)->where('heavy_weight', $max_fibonacci_weight)->orderBy('created_at', 'desc')->first();
    	return view('statistics.exercises', compact('exercise_name', 'exercise_types', 'exercises', 'allWorkouts', 'workout_sessions', 'workout_sessions_exercises_normal', 'workout_sessions_exercises_fibonacci', 'max_normal_weight', 'max_fibonacci_weight', 'max_weight'));
    }

    public function workout_history()
    {
        $user_id = Auth::id();
    	$workout_sessions = Workout_Sessions::whereRaw('created_at <> endtime')->where('user_id', $user_id)->orderBy('created_at', 'desc')->Paginate(10);
    	

    	return view('statistics.workout_history', compact('workout_sessions', 'user_id'));
    }

    public function workout_review($id)
    {


        $user_id = Auth::id();
        $workout = Workout_Sessions::where('id', $id)->first();
        $workout_sessions_exercises_normal = Workout_Sessions_Exercises_Normal::get();
        $workout_sessions_exercises_fibonacci = Workout_Sessions_Exercises_Fibonacci::get();
        $eTypes = ExerciseType3::get();
        $date = $workout->created_at;
        $date1 = $date->format('M jS Y');


        return view ('workouts.preview2', compact('workout', 'eTypes', 'user_id', 'workout_sessions_exercises_normal', 'workout_sessions_exercises_fibonacci', 'date1'));
    }

    public function indexer($value='')
    {
    	$user_id = Auth::id();
    	$indexes = Indexes::where('userid', $user_id)->orderBy('created_at', 'desc')->get();
    	$first = Indexes::where('userid', $user_id)->orderBy('created_at', 'desc')->first();

    	$date = $first->created_at;
    	$date1st = $date->format('M jS Y');

    	$height = $first->height;
    	$waist = $first->waist;
    	$shoulders = $first->shoulders;
    	$weight = $first->weight;
        $notes = $first->notes;

    	$waistRatio = ($waist / $height);
    	$adonisRatio = ($shoulders / $waist);

    	$idealWaist = ($height * 0.447);
    	$idealShoulders = (1.618 * $idealWaist);
    	switch ($height) {
    	    case '64':
    	        $idealWeight = "111-128";
    	        break;
    	    case '65':
    	        $idealWeight = "119-138";
    	        break;
    	    case '66':
    	        $idealWeight = "132-146.5";
    	        break;
    	    case '67':
    	        $idealWeight = "140-155";
    	        break;
    	    case '68':
    	        $idealWeight = "147-164";
    	        break;
    	    case '69':
    	        $idealWeight = "155-172";
    	        break;
    	    case '70':
    	        $idealWeight = "163-181";
    	        break;
    	    case '71':
    	        $idealWeight = "171-189.5";
    	        break;
    	    case '72':
    	        $idealWeight = "178-194";
    	        break;
    	    case '73':
    	        $idealWeight = "186-206.5";
    	        break;
    	    case '74':
    	        $idealWeight = "194-215";
    	        break;
    	    case '75':
    	        $idealWeight = "201-216";
    	        break;
    	    case '76':
    	        $idealWeight = "209-232";
    	        break;
    	    default:
    	    $idealWeight = "NA";
    	}

    	return view('statistics.indexer', compact('user_id', 'indexes', 'first','height', 'waist', 'idealWaist', 'shoulders', 'idealShoulders', 'weight', 'notes', 'idealWeight', 'waistRatio', 'adonisRatio', 'date1st'));
    }

    public function indexer2($id)
    {
    	$user_id = Auth::id();
    	$indexes = Indexes::where('userid', $user_id)->orderBy('created_at', 'desc')->get();
    	$first = Indexes::where('id', $id)->orderBy('created_at', 'desc')->first();

    	$date = $first->created_at;
    	$date1st = $date->format('M jS Y');

    	$height = $first->height;
    	$waist = $first->waist;
    	$shoulders = $first->shoulders;
    	$weight = $first->weight;
        $notes = $first->notes;

    	$waistRatio = ($waist / $height);
    	$adonisRatio = ($shoulders / $waist);

    	$idealWaist = ($height * 0.447);
    	$idealShoulders = (1.618 * $idealWaist);
    	switch ($height) {
    	    case '64':
    	        $idealWeight = "111-128";
    	        break;
    	    case '65':
    	        $idealWeight = "119-138";
    	        break;
    	    case '66':
    	        $idealWeight = "132-146.5";
    	        break;
    	    case '67':
    	        $idealWeight = "140-155";
    	        break;
    	    case '68':
    	        $idealWeight = "147-164";
    	        break;
    	    case '69':
    	        $idealWeight = "155-172";
    	        break;
    	    case '70':
    	        $idealWeight = "163-181";
    	        break;
    	    case '71':
    	        $idealWeight = "171-189.5";
    	        break;
    	    case '72':
    	        $idealWeight = "178-194";
    	        break;
    	    case '73':
    	        $idealWeight = "186-206.5";
    	        break;
    	    case '74':
    	        $idealWeight = "194-215";
    	        break;
    	    case '75':
    	        $idealWeight = "201-216";
    	        break;
    	    case '76':
    	        $idealWeight = "209-232";
    	        break;
    	    default:
    	    $idealWeight = "NA";
    	}

    	return view('statistics.indexer', compact('user_id', 'indexes', 'first','height', 'waist', 'idealWaist', 'shoulders', 'idealShoulders', 'weight', 'notes', 'idealWeight', 'waistRatio', 'adonisRatio', 'date1st'));
    }

    public function transfer($value='')
    {
    	$exercise_types = ExerciseType3::get();
    	$et = request('exercise_type');
    	foreach ($exercise_types as $exercise_type){
    		if($et == $exercise_type->id){
    			$location = "/statistics/exercise/";
    			$location .= $exercise_type->name;
    			return redirect($location);
    		}
    	}
    }
}


