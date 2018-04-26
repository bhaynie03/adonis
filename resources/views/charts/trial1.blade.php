@extends ('layouts.master')

@section ('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

<canvas id="graph"></canvas>


<div class="chart-container" style="position: relative; height:50vh; width:70vw">
	<canvas id="myChart" width="400" height="400"></canvas>
</div>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Height", "Waist-size", "Ideal Waist-size", "Shoulder-size", "Ideal Shoulder-size", "Waist Ratio", "Ideal Waist Ratio", "Adonis Index", "Ideal Adonis Index", "Weight", "Ideal Weight"],
        datasets: [{
            label: '# of Votes',
            data: [67, 33, 29.949, 48, 48.457, .492537, .447, 1.4545454545, 1.618, 172, 148],
            backgroundColor: [
            	'blue',
            	'black',
            	'green',
            	'black',
            	'green',
            	'black',
            	'green',
            	'black',
            	'green',
            	'black',
            	'green'
            ],
            borderColor: [
				'black',                
				'black',
				'black',
				'black',
				'black',
				'black',
				'black',
				'black',
				'black',
				'black'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>


@endsection