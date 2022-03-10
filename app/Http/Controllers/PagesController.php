<?php

namespace App\Http\Controllers;

use App\Models\Steps;
use App\Models\Solutions;
use App\Models\Questions;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(Request $request)
    {
        return view('about');
    }

    public function contact(Request $request)
    {
        return view('contact');
    }

    public function solution_search_results()
    {
        $results = [];
        $search_term = request()->search;
        $solutions = Solutions::where('solution_title', 'LIKE',  "%".$search_term."%")->paginate(5);
        $questions = Questions::where('question', 'LIKE',  "%".$search_term."%")->paginate(5);

        $results = [
            'questions' => $questions,
            'solutions' => $solutions
        ];

        return view('search_results', ['results' => $results]);

    }
}
