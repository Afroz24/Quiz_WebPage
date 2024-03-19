<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- below is css link from bootstrap website -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--below is the javscript bundle link from bootstrap website -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>



    <title> Index_Page </title>
</head>

<body>





    <div class="container card rounded mt-4">


        <div class="dropdown mb-3 mt-4 ">
            <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>

            <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>




        <div class="card-body"> Your Correct Answers are <span class="text-success font-weight-bold display-6"> {{
                $data->score }} </span> </div>
        <div class="card-body"> Your Wrong Answers are <span class="text-danger font-weight-bold display-6"> {{ 10-$data->score
                }} </span> </div>
        <div class="card-body"> Your Total Score is <span class="text-primary font-weight-bold display-6"> {{
                 $data->score-((10-$data->score)*0.5) }} </span> </div>
    </div>

    <div class="text-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('post')
            <button type="submit" class="btn btn-info mt-4"> Logout & Exit </button>
        </form>
    </div>

    {{-- <div class="text-center">
        
        <form action="{{ url('delete-data/'.$id) }}" method="POST" >
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-success mt-4"> Retake Test</button>
        </form>
        
    </div> --}}





</body>

</html>