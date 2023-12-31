<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use App\Models\Jokedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JokeController extends Controller
{
    public function getJoke()
    {
        $jokes  =  Joke::select("*")->limit(1)
        ->inRandomOrder()
        ->get();
        $jokesD =    Jokedetail::all();
        foreach ($jokesD as $item) {
            if ($item->joke_id == 1) {
                $jokes =    Joke::skip(1)->take(1)->get();
            } elseif ($item->joke_id == 2) {
                $jokes =    Joke::skip(2)->take(1)->get();
            } elseif ($item->joke_id == 3) {
                $jokes =    Joke::skip(3)->take(1)->get();
            } elseif ($item->joke_id == 4) {
                $jokes =    Joke::skip(4)->take(1)->get();
                redirect()->back()->with('alert', "That's all the jokes for today! Come back another day!");
            }
        }
        return view('index', compact('jokes'));
    }

    public  function next(Request $request)
    {
        $jokeD = new Jokedetail();

        $jokeD->joke_id = $request->joke;

        if ($request->Fun) {
            $jokeD->status = 'Funny';
        } else {
            $jokeD->status = 'Not Funny';
        }
        $jokeD->save();


        return redirect()->back();
    }

    public function again(){
        Jokedetail::truncate();
        return redirect()->back();
    }
}
