@extends ('layouts.master')

@section ('content')

<hr>

<h1>Select a Workout</h1>
@if($last_workout !== "NA")
	<p>Your last workout was "<a href="/statistics/workout_review/{{ $last_workout->id }}">{{ $last_workout->workout_name }}</a>"</p>
@endif


@if($next_workout !== "NA")
	<a href="/workouts/{{ $next_workout->name}}">Next Workout</a>
@endif
{{-- @foreach($exercises as $exercise)
	<p>{{ $exercise->workout_name }}</p>

@endforeach
 --}}





{{-- <form method="POST" action="/register">
			{{ csrf_field() }}

			<div class="form-group">
				<label for ="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>



			<div class="form-group">
				<button type="submit" class="btn btn-primary">Register</button>
			</div>

			@include ('layouts.errors')



		</form> --}}


<details>
	<summary>Category 1</summary>
	<p>Only Category 3 is currently available.</p>
</details>
<details>
	<summary>Category 2</summary>
	<p>Only Category 3 is currently available.</p>
</details>
<details>
	<summary>Category 3</summary>
	@for($i = 1; $i < 13; $i++)
		
		<details><summary>Week {{ $i }}</summary>
			@if($i !== 5 and $i !== 6 and $i !== 11 and $i !== 12)
				@for ($e = 1; $e < 5; $e++)
					@php
						$linkies = "Week " . $i . ": Day " . $e;
					@endphp
					<a href="/workouts/{{ $linkies }}">Week {{ $i }}: Day {{ $e }}</a><br>
				@endfor
			@else 
				@for ($e = 1; $e < 4; $e++)
					@php
						$linkies = "Week " . $i . ": Day " . $e;
					@endphp
					<a href="/workouts/{{ $linkies }}">Week {{ $i }}: Day {{ $e }}</a><br>
				@endfor
			@endif
			</details>
	@endfor
</details>

<p><strong>Note:</strong> For the time being we can only track workouts that actually come from the Adonis Program though in the near future we should be able to make a freestyle workout system that could record whatever kind exercises you do as you go. And at some point we'd like to make it possible to make your own workout, save them, and reuse them later.</p>
{{-- <p>The need to select a workout, and Ideally they will have an option of which cat they want, which week and day, and then what their last workout was and what their next one should be. That way you just have to follow the routine. You will get a chance to look at the workout and then choose to start the workout. It will then take you to a table that has the workout, the sets, reps, and rest as well as an input box to put in the weight you used. And also the weight you used last time (maybe top weight you've ever used. This is just a little tricky since they don't always do the same number of reps or sets etc. So maybe just list the best score for the last time they did that exercise. Might have to do some math on that one. But that makes sense for you to check your own data for. You can look up the workouts you've done and it can pop out the best scores, the average, etc for each type of exercise.) I also need to know what to do for exercises they haven't done yet, haven't input a score etc.</p> --}}


@endsection