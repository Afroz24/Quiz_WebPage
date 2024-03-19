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



    <title> Quiz </title>
</head>

<body>



    <form method="POST" action=" {{ url('quiz_submit')}} ">
        @csrf
        @method('post')

        <div class="container card mt-3 shadow p-3 mb-5 bg-white rounded">


        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-warning me-2"> {{ Auth::user()->name }} </button>
        </div>


            <center>
                <div class="colored-box bg-success text-white p-2 mb-3 rounded d-inline-block"> Quiz Competition </div>
            </center>


            <div class="card-body">

                <div class=" alert alert-success p-3 mb-4 rounded">
                    <h5> {{ $question->id }}. {{ $question->question_text }} </h5>
                </div>


                <div>
                    <label>
                        <input type="radio" name="answer" value="{{ $question->option1 }}">
                        {{ $question->option1 }}
                    </label>
                </div>

                <div>
                    <label>
                        <input type="radio" name="answer" value="{{ $question->option2 }}">
                        {{ $question->option2 }}
                    </label>
                </div>

                <div>
                    <label>
                        <input type="radio" name="answer" value="{{ $question->option3 }}">
                        {{ $question->option3 }}
                    </label>
                </div>

                <div>
                    <label>
                        <input type="radio" name="answer" value="{{ $question->option4 }}">
                        {{ $question->option4 }}
                    </label>
                </div>



                {{--here question_id is used in controller to track questions --}}
                <input type="hidden" name="question_id" value="{{ $question->id }}">


            </div>
            
            @if($question->id == 10)

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success me-2"> Submit </button>
            </div>

            @else
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success me-2"> Next </button>
            </div>

            @endif
           

        </div>
    </form>


</body>

</html>