@extends ('layouts.master')

@section ('content')

	<hr>



	@if($workout->format_type == 1)
		<table class="table table-dark">
		  <thead align="center">
		  	<tr>
		      <th colspan="5">{{ $workout->workout_name }} {{ $date1 }}</th>
		    </tr>
		</thead>
		<thead align="left">
		    <tr>
		      <th scope="col">Exercise</th>
		      <th scope="col">Sets</th>
		      <th scope="col">Reps</th>
		      <th scope="col">Rest(Sec)</th>
		      <th scope="col">Weight(pounds)</th>
		    </tr>
		  </thead>
		  <tbody align="left">

		@foreach($workout_sessions_exercises_normal as $wse)
			@if($wse->ws_id == $workout->id)
				@foreach ($eTypes as $et)
					@if ($et->id == $wse->exercise_type)
						<tr>
					      <th scope="row"><a href="/statistics/exercise/{{ $et->name }}">{{ $et->name }}</a></th>
					      <td>{{ $wse->sets }}</td>
					      <td>{{ $wse->reps }}</td>
					      <td>{{ $wse->rest }}</td>
					      <td>{{ $wse->weight }}</td>
					    </tr>
				    @endif
			    @endforeach
		    @endif
	    @endforeach
	@elseif($workout->format_type == 2)
		@foreach($workout_sessions_exercises_fibonacci as $wse)
			@php
				$set = 0;
			@endphp
			@if($wse->ws_id == $workout->id)
				@foreach ($eTypes as $et)
					@if ($et->id == $wse->exercise_type)
						@php
							$set = $set + 1;
						@endphp

						@if($wse->initial_weight == "Light")
							<table class="table table-dark">
								  <thead align="center">
								  	<tr>
								      <th colspan="5">{{ $workout->workout_name }} Set#{{ $set }}</th>
								    </tr>
								     <thead align="center">
								  	<tr>
								      <th colspan="5"><a href="/statistics/exercise/{{ $et->name }}">{{ $et->name }}</a></th>
								    </tr>
								</thead>
							  <thead>
							    <tr>
							      <th scope="col">Weight</th>
							      <th scope="col">Sets</th>
							      <th scope="col">Reps</th>
							      <th scope="col">Rest(Sec)</th>
							      <th scope="col">Recorded Weight</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <th scope="row">Light</th>
							      <td>1</td>
							      <td>21</td>
							      <td>30</td>
							      <td>{{ $wse->light_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Moderate</th>
							      <td>1</td>
							      <td>13</td>
							      <td>30</td>
							      <td>{{ $wse->moderate_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Moderate/Heavy</th>
							      <td>1</td>
							      <td>8</td>
							      <td>45</td>
							      <td>{{ $wse->moderate_heavy_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Heavy</th>
							      <td>1</td>
							      <td>5</td>
							      <td>45</td>
							      <td>{{ $wse->heavy_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Moderate/Heavy</th>
							      <td>1</td>
							      <td>8</td>
							      <td>45</td>
							      <td>{{ $wse->moderate_heavy_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Moderate</th>
							      <td>1</td>
							      <td>13</td>
							      <td>30</td>
							      <td>{{ $wse->moderate_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Light</th>
							      <td>1</td>
							      <td>21</td>
							      <td>30</td>
							      <td>{{ $wse->light_weight }}</td>
							    </tr>
						@elseif ($wse->initial_weight == "Heavy")
							<table class="table table-dark">
								  <thead align="center">
								  	<tr>
								      <th colspan="5">{{ $workout->workout_name }} Set#{{ $set }}</th>
								    </tr>
								     <thead align="center">
								  	<tr>
								      <th colspan="5"><a href="/statistics/exercise/{{ $et->name }}">{{ $et->name }}</a></th>
								    </tr>
								</thead>
							 <thead>
							    <tr>
							      <th scope="col">Weight</th>
							      <th scope="col">Sets</th>
							      <th scope="col">Reps</th>
							      <th scope="col">Rest(Sec)</th>
							      <th scope="col">Recorded Weight</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <th scope="row">Heavy</th>
							      <td>1</td>
							      <td>5</td>
							      <td>45</td>
							      <td>{{ $wse->heavy_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Moderate/Heavy</th>
							      <td>1</td>
							      <td>8</td>
							      <td>45</td>
							      <td>{{ $wse->moderate_heavy_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Moderate</th>
							      <td>1</td>
							      <td>13</td>
							      <td>30</td>
							      <td>{{ $wse->moderate_weight }}</td>
							    </tr>
							    </tr>
							    <tr>
							      <th scope="row">Light</th>
							      <td>1</td>
							      <td>21</td>
							      <td>30</td>
							      <td>{{ $wse->light_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Moderate</th>
							      <td>1</td>
							      <td>13</td>
							      <td>30</td>
							      <td>{{ $wse->moderate_weight }}</td>
							    </tr>
							    </tr>
							    <tr>
							       <th scope="row">Moderate/Heavy</th>
							      <td>1</td>
							      <td>8</td>
							      <td>45</td>
							      <td>{{ $wse->moderate_heavy_weight }}</td>
							    </tr>
							    <tr>
							      <th scope="row">Heavy</th>
							      <td>1</td>
							      <td>5</td>
							      <td>45</td>
							      <td>{{ $wse->heavy_weight }}</td>
							      
						@endif
					@endif
				@endforeach
			@endif
		@endforeach
	@endif
		
	  </tbody>
	</table>		
		<p><strong>Notes:</strong> {{ $workout->notes }}</p>
@endsection