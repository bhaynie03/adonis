@extends ('layouts.master')


@section ('content')

<h1>{{ $exercise_name }}</h1>




<form method="POST" action="/statistics/transfer">
	{{ csrf_field() }}

	<h5>Search for another Exercise</h5>
	<div class="form-group row">
		<div class="form-group">
			{{-- <label for ="exercise_type">Search Exercise</label> --}}
			<!-- <input type="integer" class="form-control" id="exercise_type" name="exercise_type" value="" required> -->
			<select class="form-control" id="exercise_type" name="exercise_type" required>

				@foreach ($exercise_types as $exercise_type)
					@if($exercise_type->name == $exercise_name)
						<option value="{{$exercise_type->id}}" selected>{{ $exercise_type->name }}</option>	
					@else
						<option value="{{$exercise_type->id}}">{{ $exercise_type->name }}</option>
					@endif
				@endforeach

			</select>
		</div>


		<div class="form-group">
			<button type="submit" class="btn btn-primary">Search</button>
		</div>
	</div>

	@include ('layouts.errors')
</form>
<hr>

@foreach ($exercise_types as $exercise_type)
	@if ($exercise_type->name == $exercise_name)
		<h5><a href="{{ $exercise_type->link }}"> Exercise Video Link</a></h5>
	@endif
@endforeach

@if($max_weight !== "NA")
	<p>Max weight used: <font color="brown"><strong>{{ $max_weight }}</strong></font></p>
@endif
{{-- 	@if(!empty($max_fibonacci_weight) and !empty($max_normal_weight))
			@if($max_normal_weight >= $max_fibonacci_weight)
				<p>Max weight used: {{ $max_normal_weight }}</p>
			@elseif($max_fibonacci_weight >= $max_normal_weight)
				<p>Max weight used: {{ $max_fibonacci_weight }}</p>
			@endif
	@endif

	@if(!empty($max_normal_weight) and empty($max_fibonacci_weight))
		<p>Max weight used: {{ $max_normal_weight}}</p>
	@elseif(empty($max_normal_weight) and !empty($max_fibonacci_weight))
		<p>Max weight used: {{ $max_fibonacci_weight }}</p>
	@endif --}}

<h2>Your Exercise History</h2>




<table class="table table-dark">
  <thead align="center">
  	<tr>
      <th colspan="7">{{ $exercise_name }}</th>
    </tr>
</thead>
<thead align="left">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Workout</th>
      <th scope="col">Type</th>
      <th scope="col">Sets(Sec)</th>
	  <th scope="col">Reps</th>
	  <th scope="col">Rest</th>
	  <th scope="col">Weight</th>

    </tr>
  </thead>
  <tbody align="left">




@foreach ($allWorkouts as $aw)
	@foreach ($exercise_types as $et)
	@foreach ($workout_sessions as $ws)
		@if($et->id == $aw->exercise_type)
		@if($ws->id == $aw->ws_id)
			
				@php

					$slot1 = "NA";
					$slot2 = "NA";
					$slot3 = "NA";
					$slot4 = "NA";
					$max_weight2 = "NA";

					if ($ws->format_type == 1){
						$format_type = "Normal";
					}else{
						$format_type = "Fibonacci";
					}
					$date = $ws->created_at;
					$date1 = $date->format('M jS Y');

					// foreach($workout_sessions_exercises_normal as $wsen){
						if ($format_type == "Normal" ){
							$slot1 = $aw->sets;
							$slot2 = $aw->reps;
							$slot3 = $aw->rest;
							$slot4 = $aw->weight;
							$max_weight2 = "NA";
						}
					// }
					// foreach($workout_sessions_exercises_fibonacci as $wsef){
						if ($format_type == "Fibonacci" ){
							$slot1 = "L:" . $aw->light_weight . "*";
							$slot2 = "M:" . $aw->moderate_weight . "*";
							$slot3 = "MH:" . $aw->moderate_heavy_weight . "*";
							$slot4 = "H:" . $aw->heavy_weight . "*";
							$max_weight2 = "H:" . $max_weight . "*";
						}
					// }
				@endphp

			  		<tr>
			  	      <th scope="row">{{ $date1 }}</th>
			  	      <td><a href="/statistics/workout_review/{{ $ws->id}}">{{ $ws->workout_name }}</a></td>
			  	      <td>{{ $format_type }}</td>
			  	      <td>{{ $slot1 }}</td>
			  	      <td>{{ $slot2 }}</td>
			  	      <td>{{ $slot3 }}</td>
			  	      <td>
			  	      	@if($max_weight == $slot4 or $max_weight2 == $slot4 )
			  	      		<font color="brown"><strong>{{ $slot4 }}</strong></font>
						@else
							{{ $slot4 }}
						@endif
						</td>
			  	  </tr>

			   

			

		@endif
		@endif
	@endforeach
	@endforeach
@endforeach

  </tbody>
</table>
@if (empty($slot4))
	<p><strong>It looks like you don't have any data on this exercise. Record a couple more workouts and maybe one of them will have this one.</strong></p>
@else
	<p><strong>*</strong> If you see this on some of the numbers it means it is from a Fibonacci workout which are are done and are measured differently. The 'L', 'M', 'MH', and 'H' stand for Light weight, Moderate weight, Moderate-Heavy weight and Heavy weight respectively. To learn more read <a href="#">here</a>.</p>
@endif
{{ $allWorkouts->links("pagination::bootstrap-4") }}




@endsection