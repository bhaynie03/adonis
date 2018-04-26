<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exercise3;
use App\ExerciseType3;
use App\FibonacciSet3;
use App\Workout3;
use App\Indexes;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['welcome_page', 'about', 'reading', 'cat3'  ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome_page()
    {
        return view('welcome_page');
    }
    public function about()
    {
        return view('home.about');
    }
    public function reading()
    {
        return view('home.reading');
    }
    public function cat3($value='')
    {
        $pages = DB::table('weeks')->Paginate(1);
        $workouts = Workout3::get();
        $exercises = Exercise3::get();
        $fSets = FibonacciSet3::get();
        $eTypes = ExerciseType3::get();
        return view('home.cat3', compact('workouts', 'exercises', 'fSets', 'eTypes', 'pages'));
    }
    public function indexer($value='')
    {
        $userid = Auth::id();
        return view('home.indexer_create', compact('userid'));
    }
    public function indexer_store($value='')
    {
        
        $this->validate(request(), [
            'height' => 'required',
            'waist' => 'required',
            'shoulders' => 'required',
            'weight' => 'required'
        ]);

        $userid = Auth::id();

        $height = request('height');
        $waist = request('waist');
        $shoulders = request('shoulders');
        $weight = request('weight');
        $notes = request ('notes');

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

            Indexes::create(request(['userid','height', 'waist', 'shoulders', 'weight', 'notes']));
            return view('home.indexer_create_store', compact('height', 'waist', 'idealWaist', 'shoulders', 'idealShoulders', 'weight', 'idealWeight', 'waistRatio', 'adonisRatio', 'userid', 'notes'));

    }


}












