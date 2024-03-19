<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id', 'user_answer', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
