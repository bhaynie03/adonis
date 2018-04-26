@extends ('layouts.master')


@section ('content')

<h1>Statistics</h1>
<h4>Where all you data stays</h4>

<ul>
	<li><a href="/statistics/workout_history">Workout History</a></li>
	<li><a href="/statistics/exercise/Alternate Incline Dumbbell Press">Exercise History</a></li>
	<li><a href="/statistics/indexer">Adonis Index History</a></li>
{{-- 	<li><a href="#">Exercise Information</a></li> --}}

</ul>

<p>This is one of the coolest features for this website. Here you can look at your workout history to see your progress without having to thumb through all of the records. We keep all the information in are database so you can get it when you want it. We have several ways for you to look at your data.</p>

<p>If you want to see how close you are to the ideal body image you can look up your <a href="/statistics/indexer">Adonis Index History</a>. If you have taken an index or yourself (<a href="/indexer">You can do that here</a>) we calculate your ideal dimensions and weight based off of your height and then you can see how close you are to your ideal body. The calculation is fairly simple but the explanation is pretty in depth (<a href="/_THE_THEORY_OF_IDEAL_BODY_PROPORTIONS_AGR.pdf">You can find that here</a>).</p>

<p>You can also look up your overall <a href="/statistics/exercise/Alternate Incline Dumbbell Press">exercise history</a> (which exercises you have done) or look up a specific exercise to see how you have improved over time with a specific exercise. Lets say you struggle with a particular exercise or you want to further develop a certain body part. You can look up the exercise and see how often you've been doing that exercise as well as any changes in the weights you use (hopefully it is increasing :).</p>

<p>If you are looking to see a general overview of what workouts you have done, you can look at that too.</p>

<p><strong>Note:</strong> For the time being we can only track workouts that actually come from the Adonis Program though in the near future we should be able to make a freestyle workout system that could record whatever kind exercises you do as you go. And at some point we'd like to make it possible to make your own workout, save them, and reuse them later.</p>





@endsection