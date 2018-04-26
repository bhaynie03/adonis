@extends ('layouts.master')

@section ('content')

	<hr>

	<form method="POST" action="/workoutSession_end/{{ $workout_name }}">
				{{ csrf_field() }}

	@if($workout->format_type == 1)
		<table class="table table-dark">
		  <thead align="center">
		  	<tr>
		      <th colspan="5">{{ $workout->name }}</th>
		    </tr>
		</thead>
		<thead align="left">
		    <tr>
		      <th scope="col">Exercise</th>
		      <th scope="col">Sets</th>
		      <th scope="col">Reps</th>
		      <th scope="col">Rest(Sec)</th>
			  <th scope="col">Weights Used (in pounds)</th>

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
					      <td id="exercise{{ $exercise->id }}" onclick="countdown('exercise{{ $exercise->id }}', {{ $exercise->rest }})"><font color="yellow">{{ $exercise->rest }}</font></td>
					      <td><div class="form-group">
					      	<input type="integer" class="form-control" id="{{ $et->id }}" name="{{ $et->id }}" value="0">
					      </div></td>
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
						$lightSetName = "Light " . $set;
						$moderateSetName = "Moderate " . $set;
						$moderate_heavySetName = "Moderate/Heavy " . $set;
						$heavySetName = "Heavy " . $set;

						$lightSet = "light_" . $set;
						$moderateSet = "moderate_" . $set;
						$moderate_heavySet = "moderate/heavy_" . $set;
						$heavySet = "heavy_" . $set;

						$low = 30;
						$high = 45;

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
						      <td id="{{ $fSet->id }}l1" onclick="countdown('{{ $fSet->id }}l1', {{ $low }})"><font color="yellow">30</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate</th>
						      <td>1</td>
						      <td>13</td>
						      <td id="{{ $fSet->id }}m1" onclick="countdown('{{ $fSet->id }}m1', {{ $low }})"><font color="yellow">30</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate/Heavy</th>
						      <td>1</td>
						      <td>8</td>
						      <td id="{{ $fSet->id }}mh1" onclick="countdown('{{ $fSet->id }}mh1', {{ $high }})"><font color="yellow">45</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Heavy</th>
						      <td>1</td>
						      <td>5</td>
						      <td id="{{ $fSet->id }}h" onclick="countdown('{{ $fSet->id }}h', {{ $high }})"><font color="yellow">45</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate/Heavy</th>
						      <td>1</td>
						      <td>8</td>
						      <td id="{{ $fSet->id }}mh2" onclick="countdown('{{ $fSet->id }}mh2', {{ $high }})"><font color="yellow">45</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate</th>
						      <td>1</td>
						      <td>13</td>
						      <td id="{{ $fSet->id }}m2" onclick="countdown('{{ $fSet->id }}m2', {{ $low }})"><font color="yellow">30</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Light</th>
						      <td>1</td>
						      <td>21</td>
						      <td id="{{ $fSet->id }}l2" onclick="countdown('{{ $fSet->id }}l2', {{ $low }})"><font color="yellow">30</font></td>
						    </tr>
						    
						  </tbody>
						</table>
						<div class="form-group row">
							<div class="col-xs-2">
								<label for="{{ $lightSet }}">{{ $lightSetName }}:</label>
								<input type="number" class="form-control" id="{{ $lightSet }}" name="{{ $lightSet }}" value="0">
							</div>
							<div class="col-xs-2">
								<label for="{{ $moderateSet }}">{{ $moderateSetName }}:</label>
								<input type="number" class="form-control" id="{{ $moderateSet }}" name="{{ $moderateSet }}" value="0">
							</div>
							<div class="col-xs-2">
								<label for="{{ $moderate_heavySet }}">{{ $moderate_heavySetName }}:</label>
								<input type="number" class="form-control" id="{{ $moderate_heavySet }}" name="{{ $moderate_heavySet }}" value="0">
							</div>
							<div class="col-xs-2">
								<label for="{{ $heavySet }}">{{ $heavySetName }}:</label>
								<input type="number" class="form-control" id="{{ $heavySet }}" name="{{ $heavySet }}" value="0">
							</div>
						</div>

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
						      <td id="{{ $fSet->id }}h1" onclick="countdown('{{ $fSet->id }}h1', {{ $high }})"><font color="yellow">45</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate/Heavy</th>
						      <td>1</td>
						      <td>8</td>
						      <td id="{{ $fSet->id }}mh1" onclick="countdown('{{ $fSet->id }}mh1', {{ $high }})"><font color="yellow">45</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate</th>
						      <td>1</td>
						      <td>13</td>
						      <td id="{{ $fSet->id }}m1" onclick="countdown('{{ $fSet->id }}m1', {{ $low }})"><font color="yellow">30</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Light</th>
						      <td>1</td>
						      <td>21</td>
						      <td id="{{ $fSet->id }}l" onclick="countdown('{{ $fSet->id }}l', {{ $low }})"><font color="yellow">30</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate</th>
						      <td>1</td>
						      <td>13</td>
						      <td id="{{ $fSet->id }}m2" onclick="countdown('{{ $fSet->id }}m2', {{ $low }})"><font color="yellow">30</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Moderate/Heavy</th>
						      <td>1</td>
						      <td>8</td>
						      <td id="{{ $fSet->id }}mh2" onclick="countdown('{{ $fSet->id }}mh2', {{ $high }})"><font color="yellow">45</font></td>
						    </tr>
						    <tr>
						      <th scope="row">Heavy</th>
						      <td>1</td>
						      <td>5</td>
						      <td id="{{ $fSet->id }}h2" onclick="countdown('{{ $fSet->id }}h2', {{ $high }})"><font color="yellow">45</font></td>
						    </tr>
						  </tbody>
						</table>

						<div class="form-group row">
							<div class="col-xs-2">
								<label for="{{ $lightSet }}">{{ $lightSetName }}:</label>
								<input type="number" class="form-control" id="{{ $lightSet }}" name="{{ $lightSet }}" value="0">
							</div>
							<div class="col-xs-2">
								<label for="{{ $moderateSet }}">{{ $moderateSetName }}:</label>
								<input type="number" class="form-control" id="{{ $moderateSet }}" name="{{ $moderateSet }}" value="0">
							</div>
							<div class="col-xs-2">
								<label for="{{ $moderate_heavySet }}">{{ $moderate_heavySetName }}:</label>
								<input type="number" class="form-control" id="{{ $moderate_heavySet }}" name="{{ $moderate_heavySet }}" value="0">
							</div>
							<div class="col-xs-2">
								<label for="{{ $heavySet }}">{{ $heavySetName }}:</label>
								<input type="number" class="form-control" id="{{ $heavySet }}" name="{{ $heavySet }}" value="0">
							</div>
						</div>

					@endif
					@endif
				@endforeach
			@endif
		@endforeach
	@endif



				<div class="form-group">	
					<textarea rows="4" cols="50" type="notes" class="form-control" id="notes" name="notes" value="Workout Notes">Workout Notes</textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">End Workout</button>
				</div>
	
				@include ('layouts.errors')
	
	
	
			</form>
<script>

	var bleep = new Audio();
	bleep.src = "/sound1.mp3";

	function countdown( id, time) {
		var endtime = new Date();
		endtime.setSeconds(endtime.getSeconds() + time);

		var countDownDate = endtime;

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get todays date and time
		  var now = new Date().getTime();

		  // Find the distance between now an the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		  var totalSeconds = (minutes * 60) + seconds;

		  // Display the result in the element with id="timer"
		  document.getElementById(id).innerHTML = "<font color='red'>" + totalSeconds + "</font>";

		  // If the count down is finished, write some text
		  if (distance < 0) {
		    clearInterval(x);
		    document.getElementById(id).innerHTML = "<font color='yellow'>" + time + "</font>";
		    bleep.play();
		  }
		}, 1000);
		}


</script>


@endsection