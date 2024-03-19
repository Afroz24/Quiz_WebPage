@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if( Auth::user())
                    {{ __('You are logged in!') }}
                    @else
                    {{ __('Please Login or Register to start Quiz!') }}
                    @endif
                    
                    <p class="lead mt-2">Welcome to the quiz! Please read the below instructions carefully before starting.
                    </p>


                    <div class="container card rounded mt-2">
                        <div class="scroll-box">

                            <center>
                                <div class="colored-box bg-info text-white p-2 mb-3 mt-2 rounded d-inline-block"> Quiz Instructions </div>
                            </center>

                            <ul>
                            <li><div class="lead">This quiz consists of multiple-choice questions. Choose the correct option
                                for each question.</div> </li>
                                <li><div class="lead text-danger">This quiz has Negative marking for each wrong answer i.e.  <span class="text-danger font-weight-bold display-6"> -0.5 </span> for each wrong answer </div> </li>
                                <li><div class="lead">This quiz has a total of 10 questions </div> </li>
                                <li><div class="lead">Time duration for this quiz is 5 minutes </div> </li>
                            </ul>

                        </div>
                    </div>



                    <div class="text-center"> <a class="btn btn-info mt-4" href=" {{ url('quiz') }} "> Start Quiz </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection