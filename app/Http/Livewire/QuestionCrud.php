<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Questions;

class QuestionCrud extends Component
{
    public $model;

    public $question;

    public $deleteQuestion = false;

    public $editQuestion = false;

    protected $rules = [
        'question.question' => 'required|min:3|max:255',
        'question.description' => 'required|min:3',
    ];

    public function render()
    {
        return view('livewire.question-crud');
    }

    /**
     * Question CRUD.
    */

    public function editQuestion()
    {
        $this->editQuestion = true;
    }

    public function eQuestion(Questions $question)
    {
        $this->validate();

        $this->question->save();

        $this->editQuestion = false;

        return redirect('question/view/'. $question->id);
    }

    public function deleteQuestion()
    {
        $this->deleteQuestion = true;
    }

    public function delQuestion(Questions $question)
    {
        $question->delete();
        $this->deleteQuestion = false;
        return redirect('questions');
    }
}
