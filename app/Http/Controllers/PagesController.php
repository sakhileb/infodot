<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Steps;
use App\Models\Solutions;
use App\Models\Questions;
use App\Models\Associates;
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

    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $get_profile = User::where('id', $id)->first();
        $association = Associates::where('user_id', Auth::id())->where('associate_id', $id)->whereNull('deleted_at')->first();
        return view('profile.show', [
            'user' => $get_profile,
            'association' => $association,
        ]);
    }

    public function edit()
    {
        return view('profile.edit');
    }
}
