@extends ('layouts.master')

@section ('content')

<form method="POST" action="/indexer">
	{{ csrf_field() }}


	<div class="form-group">
		<label for ="height">Height (in inches):</label>
		<input type="integer" class="form-control" id="height" name="height" value="{{ $height }}" required>
	</div>

	<div class="form-group">
		<label for ="waist">Waist (in inches):</label>
		<input type="integer" class="form-control" id="waist" name="waist" value="{{ $waist }}" required>
	</div>

	<div class="form-group">
		<label for ="shoulders">Shoulders (in inches):</label>
		<input type="integer" class="form-control" id="shoulders" name="shoulders" value="{{ $shoulders }}" required>
	</div>

	<div class="form-group">
		<label for ="weight">Weight (in pounds):</label>
		<input type="integer" class="form-control" id="weight" name="weight" value="{{ $weight }}" required>
	</div>

	<div class="form-group">	
		<textarea rows="4" cols="50" type="notes" class="form-control" id="notes" name="notes" value="{{ $notes }}">{{ $notes }}</textarea>
	</div>

	<div class="form-group">
		<input type="hidden" class="form-control" id="userid" name="userid" value="{{ $userid }}" required>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Calculate And Store</button>
	</div>

	@include ('layouts.errors')

</form>

<hr>


<table class="table table-dark">
	<thead align="center">
		<tr>
			<th colspan="4">Your Index</th>
		</tr>
	</thead>
	<thead>
		
	</thead>
		<tbody>
			<tr>
				<th scope="col">Measurement</th>
				<th scope="col">Value</th>
				
				<tr>
					<th scope="row">Height</th>
					<td>{{ $height }} Inches</td>
				</tr>
				<tr>
					<th scope="row">Ideal Waist</th>
					<td>{{ $idealWaist }} Inches</td>
				</tr>
				<tr>
					<th scope="row">Actual Waist</th>
					<td><font color="green">{{ $waist }} Inches</font></td>
				</tr>
				<tr>
					<th scope="row">Ideal Shoulders</th>
					<td>{{ $idealShoulders }} Inches</td>
				</tr>
				<tr>
					<th scope="row">Actual Shoulders</th>
					<td><font color="green">{{ $shoulders }} Inches</font></td>
				</tr>
				<tr>
					<th scope="row">Ideal Waist Ratio</th>
					<td>.447</td>
				</tr>
				<tr>
					<th scope="row">Actual Waist Ratio</th>
					<td><font color="green">{{ $waistRatio }}</font></td>
				</tr>
				<tr>
					<th scope="row">Ideal Adonis Index Ratio</th>
					<td>1.618</td>
				</tr>
				<tr>
					<th scope="row">Actual Adonis Index Ratio</th>
					<td><font color="green">{{ $adonisRatio }}</font></td>
				</tr>
				<tr>
					<th scope="row">Ideal Weight</th>
					<td>{{ $idealWeight}} Pounds</td>
				</tr>
				<tr>
					<th scope="row">Actual Weight</th>
					<td><font color="green">{{ $weight }}</font> Pounds</td>
				</tr>
			</tr>
	</tbody>
</table>
<p>Notes: {{ $notes }}</p>
{{-- <p>Ideal Height: {{ $height }} inches</p>
<p>Ideal Waist: {{ $idealWaist }} inches</p>
<p>Ideal Shoulders: {{ $idealShoulders }} inches</p>
<p>Ideal Waist Ratio: .447</p>
<p>Ideal Adonis Index Ratio: 1.618</p>
<p>Ideal Weight: pounds</p>

<hr>


<p>Height: {{ $height }} inches</p>		
<p>Waist: {{ $waist }} inches</p>
<p>Shoulders: {{ $shoulders }} inches</p>
<p>Actual Waist Ratio: {{ $waistRatio }}</p>
<p>Actual Adonis Ratio: {{ $adonisRatio }}</p>
<p>Actual Weight: {{ $weight }} pounds</p> --}}







@endsection

