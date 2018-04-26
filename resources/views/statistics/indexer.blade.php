@extends ('layouts.master')


@section ('content')

<h2>Your Adonis Index</h2>



<table class="table table-dark">
	<thead align="center">
		<tr>
			<th colspan="4">Your Index for {{ $date1st }}</th>
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

<h4>Your Index History</h4>

@foreach($indexes as $index)
	@php
		$date = $index->created_at;
		$date1 = $date->format('M jS Y');
	@endphp
	<p><a href="/statistics/indexer/{{ $index->id }}">{{ $date1 }}</a></p>
@endforeach





@endsection