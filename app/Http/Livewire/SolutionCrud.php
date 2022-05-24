<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Steps;
use App\Models\Solutions;

class SolutionCrud extends Component
{
    public $model;

    public $solution;

    public $deleteSolution = false;

    public $editSolution = false;

    protected $rules = [
        'solution.solution_title' =>'required|min:3|max:255',
        'solution.solution_description' =>'required|min:3',
        'solution.tags' =>'required|min:3',
        'solution.duration' =>'required',
        'solution.duration_type' =>'required',
        'solution.steps' =>'required'
    ];

    public function render()
    {
        return view('livewire.solution-crud');
    }

    /**
     * Solution CRUD.
    */

    public function editSolution()
    {
        $this->editSolution = true;
    }

    public function eSolution(Solutions $solution)
    {
        $this->validate();

        $this->solution->save();

        // $steps = $request->input('solution_heading');

        // foreach ($steps as $key => $n){
        //     $solution_step = new Steps();

        //     $solution_step->user_id = auth()->user()->id;
        //     $solution_step->solution_id = $solution->id;
        //     $solution_step->solution_heading = $request->input('solution_heading')[$key];
        //     $solution_step->solution_body = $request->input('solution_body')[$key];
        //     $solution_step->save();
        // }

        $this->editSolution = false;

        return redirect('solution/view/'. $solution->id);
    }

    public function deleteSolution()
    {
        $this->deleteSolution = true;
    }

    public function delSolution(Solutions $solution)
    {
        $solution->delete();
        $this->deleteSolution = false;
        return redirect('solutions');
    }
}
