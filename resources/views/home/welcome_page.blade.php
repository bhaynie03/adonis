@extends ('layouts.master')

@section ('content')

<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">You do the workout and we'll do the rest.</h1>
          <p class="lead my-3">The Adonis Index Program is designed to give you the health and the body you've been looking for. We've compiled the content so you can easily follow the program, and we've made it easy to track your time, workouts, and gains without the hassle of compiling the information yourself. We've tried to do everything we can to make it so all you have to do. . . is the workout.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue to the About page</a></p>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary"></strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Register Now!</a>
              </h3>
              <div class="mb-1 text-muted"><!-- Nov 12 --></div>
              <p class="card-text mb-auto">You can start working out, record your data, and get the best information about supplements, practices, and workout strategy.</p>
              <a href="#">Register</a>
            </div>
            <!-- <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap"> -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success"></strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Check out our data!</a>
              </h3>
              <div class="mb-1 text-muted"></div>
              <p class="card-text mb-auto">We can store all your data and then pull out interesting stats you might enjoy seeing. Improvement, high scores, frequency of your workouts. We've made analisis easy.</p>
              <a href="#">See data page</a>
            </div>
            <!-- <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap"> -->
          </div>
        </div>
      </div>
    </div>

    @endsection