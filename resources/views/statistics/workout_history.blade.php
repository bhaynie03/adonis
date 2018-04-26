@extends ('layouts.master')


@section ('content')

<h2>Your Workout History</h2>

<table class="table table-dark">
  <thead align="center">

</thead>
<thead align="left">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Workout</th>
      <th scope="col">Duration(min)</th>
      <th scope="col">Type</th>
      <th scope="col">Notes</th>


    </tr>
  </thead>
  <tbody align="left">

	@foreach ($workout_sessions as $ws)
		{{-- @if($ws->endtime == $ws->created_at)
		@else --}}@if($ws->user_id == $user_id)

			@php
				$date = $ws->created_at;
				$date1 = $date->format('M jS Y');
				if($ws->format_type == 1){
					$format_type = "Normal";
				}else{
					$format_type = "Fibonacci";
				}
				$duration = strtotime($ws->endtime) - strtotime($ws->created_at);
				$duration1 = floor($duration / 60);
				if ($duration1 <= 0){
					$duration1 = $duration . " seconds";
				}
			@endphp
				<tr>
			      <th scope="row">{{ $date1 }}</th>
			      <td><a href="/statistics/workout_review/{{ $ws->id }}">{{ $ws->workout_name }}</a></td>
			      <td>{{ $duration1 }}</td>
			      <td>{{ $format_type }}</td>
			      <td>{{ $ws->notes }}</td>

			  </tr>
		@endif
	@endforeach
	  </tbody>
	</table>
	@if(empty($format_type))
		<p>You haven't done any workouts yet.</p>
	@endif
{{ $workout_sessions->links("pagination::bootstrap-4") }}


@endsection