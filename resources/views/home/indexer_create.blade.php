@extends ('layouts.master')

@section ('content')

<hr>
<h1>Calculate Your Adonis Index</h1>

<form method="POST" action="/indexer">
			{{ csrf_field() }}


			<div class="form-group">
				<label for ="height">Height (in inches):</label>
				<input type="integer" class="form-control" id="height" name="height" required>
			</div>

			<div class="form-group">
				<label for ="waist">Waist (in inches):</label>
				<input type="integer" class="form-control" id="waist" name="waist" required >
			</div>

			<div class="form-group">
				<label for ="shoulders">Shoulders (in inches):</label>
				<input type="integer" class="form-control" id="shoulders" name="shoulders" required >
			</div>

			<div class="form-group">
				<label for ="weight">Weight (in pounds):</label>
				<input type="integer" class="form-control" id="weight" name="weight" required>
			</div>

			<div class="form-group">	
				<textarea rows="4" cols="50" type="notes" class="form-control" id="notes" name="notes" value="Index Notes">Index Notes</textarea>
			</div>

			<div class="form-group">
				<input type="hidden" class="form-control" id="userid" name="userid" value="{{ $userid }}" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Calculate And Store</button>
			</div>

			@include ('layouts.errors')



		</form>






@endsection