@extends ('layouts.master')

@section ('content')

	<hr>
	<form method="POST" action="/workoutSession/{{ $workout_name }}">
				{{ csrf_field() }}
	

				<div class="form-group">
					@if($workout->format_type == 1)
						<input type="hidden" name="format_type" value="1">
					@else
						<input type="hidden" name="format_type" value="2">
					@endif	
					<input type="hidden" name="user_id" value="{{ $user_id }}">
					<input type="hidden" name="workout_name" value="{{ $workout_name }}">
					<button type="submit" class="btn btn-primary">Start Workout</button>
				</div>
	
				@include ('layouts.errors')
	
	
	
			</form>


	@if($workout->format_type == 1)
		<table class="table table-dark">
		  <thead align="center">
		  	<tr>
		      <th colspan="4">{{ $workout->name }}</th>
		    </tr>
		</thead>
		<thead align="left">
		    <tr>
		      <th scope="col">Exercise</th>
		      <th scope="col">Sets</th>
		      <th scope="col">Reps</th>
		      <th scope="col">Rest(Sec)</th>
		    </tr>
		  </thead>
		  <tbody align="left">

		@foreach ($exercises as $exercise)
			@if ($exercise->workout_name == $workout->name)
				@foreach ($eTypes as $et)
					@if ($et->id == $exercise->exercise_type)
						<tr>
					      <th scope="row"><a href="/statistics/exercise/{{ $et->name }}">{{ $et->name }}</a></th>
					      <td>{{ $exercise->sets }}</td>
					      <td>{{ $exercise->reps }}</td>
					      <td>{{ $exercise->rest }}</td>
					    </tr>
					@endif
				@endforeach
			@endif
		@endforeach
		    
		  </tbody>
		</table>

	@elseif ($workout->format_type == 2)
		
		@php
			$set = 0;
		@endphp
		@foreach( $fSets as $fSet )
			@if( $fSet->workout_name == $workout->name )
				@foreach( $eTypes as $et)
					@if($et->id == $fSet->exercise_type)
						
					@php
						$set = $set + 1;
					@endphp
					
				

					@if($fSet->weight == "Light")



						<table class="table table-dark">
							  <thead align="center">
							  	<tr>
							      <th colspan="4">{{ $workout->name }} Set#{{ $set }}</th>
							    </tr>
							     <thead align="center">
							  	<tr>
							      <th colspan="4"><a href="/statistics/exercise/{{ $et->name }}">{{ $et->name }}</a></th>
							    </tr>
							</thead>
						  <thead>
						    <tr>
						      <th scope="col">Weight</th>
						      <th scope="col">Sets</th>
						      <th scope="col">Reps</th>
						      <th scope="col">Rest(Sec)</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">Light</th>
						      <td>1</td>
						      <td>21</td>
						      <td>30</td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate</th>
						      <td>1</td>
						      <td>13</td>
						      <td>30</td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate/Heavy</th>
						      <td>1</td>
						      <td>8</td>
						      <td>45</td>
						    </tr>
						    <tr>
						      <th scope="row">Heavy</th>
						      <td>1</td>
						      <td>5</td>
						      <td>45</td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate/Heavy</th>
						      <td>1</td>
						      <td>8</td>
						      <td>45</td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate</th>
						      <td>1</td>
						      <td>13</td>
						      <td>30</td>
						    </tr>
						    <tr>
						      <th scope="row">Light</th>
						      <td>1</td>
						      <td>21</td>
						      <td>30</td>
						    </tr>
						    
						  </tbody>
						</table>


					@elseif ($fSet->weight == "Heavy")
						<table class="table table-dark">
							  <thead align="center">
							  	<tr>
							      <th colspan="4">{{ $workout->name }} Set#{{ $set }}</th>
							    </tr>
							     <thead align="center">
							  	<tr>
							      <th colspan="4"><a href="/statistics/exercise/{{ $et->name }}">{{ $et->name }}</a></th>
							    </tr>
							</thead>
						 <thead>
						    <tr>
						      <th scope="col">Weight</th>
						      <th scope="col">Sets</th>
						      <th scope="col">Reps</th>
						      <th scope="col">Rest(Sec)</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">Heavy</th>
						      <td>1</td>
						      <td>5</td>
						      <td>45</td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate/Heavy</th>
						      <td>1</td>
						      <td>8</td>
						      <td>45</td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate</th>
						      <td>1</td>
						      <td>13</td>
						      <td>30</td>
						    </tr>
						    <tr>
						      <th scope="row">Light</th>
						      <td>1</td>
						      <td>21</td>
						      <td>30</td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate</th>
						      <td>1</td>
						      <td>13</td>
						      <td>30</td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate/Heavy</th>
						      <td>1</td>
						      <td>8</td>
						      <td>45</td>
						    </tr>
						    <tr>
						      <th scope="row">Heavy</th>
						      <td>1</td>
						      <td>5</td>
						      <td>45</td>
						    </tr>
						  </tbody>
						</table>
					@endif
					@endif
				@endforeach
			@endif
		@endforeach
	@endif





@endsection