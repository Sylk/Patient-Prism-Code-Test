<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use MathParser\StdMathParser;
use MathParser\Interpreting\Evaluator;

class CalculatorController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->equation;

        // If attempting division by 0, just assign the solution to undefined
        if(preg_match("/\/0/" , $input)) {
            $solution = "undefined";
        } else {
            $parser = new StdMathParser();
            $evaluator = new Evaluator();

            $AST = $parser->parse($input);
            $solution = $AST->accept($evaluator);
        }

        Calculation::create([
            'user_id'  => Auth::id(),
            'equation' => $input,
            'solution' => $solution,
        ]);


        return Redirect::back();
    }

    public function index() {
        $user = User::find(Auth::id());

        return Inertia::render('Dashboard', [
            'calculations' => $user->calculations()->get()
        ]);
    }

    public function destroy(Calculation $calculation) {
        $calculation->delete();
        return Redirect::back();
    }

    public function wipe() {
        $user = User::find(Auth::id());
        $user->calculations()->delete();

        return Redirect::back();
    }
}
