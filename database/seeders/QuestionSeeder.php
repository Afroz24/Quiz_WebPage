<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_j = File::get("database/json_folder/questions_options.json");

        // $data = json_decode($data_j);   // or 
        $data = collect( json_decode( $data_j ) );

        $data->each(function ( $obj ){
            Question::create([

                "question_text" => $obj->question_text,
                "option1" => $obj->option1, //here this   $obj->option1 option1 is the property from json file and  "option1" is the colum name of table 
                "option2" => $obj->option2, 
                "option3" => $obj->option3, 
                "option4" => $obj->option4,
                "correct_option"=>$obj->correct_option,

            ]);
        });
    }
}
