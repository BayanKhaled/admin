<?php

namespace App\Http\Controllers;

use App\Models\movie;
use Illuminate\Http\Request;

class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return movie::all();
        // return movie::get();
        // return movie::with('actor:id,name')->select('actor.*');
        // return movie::with('actor:id,name')->get();

        // $books = App\Models\Book::with('author:id,name')->get();

        $movie = movie::with('actor')->get();
        return $movie->toJson(JSON_PRETTY_PRINT);
        return $movie->toJson();

        $movie = movie::with('actor')->get();
        return $movie->toArray();
        
        $movie = movie::with('actor')->find(1);
        return $movie->attributesToArray();



        $movies = movie::all();
        $movies = movie::with('actor:id,name')->get();
        $movies = movie::where('actor_id', 1)
               ->orderBy('rate')
               ->take(10)
               ->get();

        /*
        $movies = movie::where('rate', '8')->first();
        echo $movies->title . '   ';
        echo $movies->actor->name;
        echo '<br/>----------------------<br/>';
        // return ;
        */
        // return view('test');
        $actor = \App\models\actor::find($request->actor_id);
        $movie = \App\models\movie::find($request->movie_id);
        $movie->actor->attach($actor);
        
        $movie->actor->attach('valueOfFirstColumn',['keyOfSecondColumn','valueOfSecondColumn']);
        $movies = movie::get();
        $movies = movie::with('actor')->get();
        foreach ($movies as $movie) {
             echo $movie->title . '   ';
             echo $movie->desc . '   ';
             echo $movie->date . '   ';
             echo $movie->rate . '   ';
            echo $movie->actor->name;
            // echo $movie->actor[0]->name;
            echo '<br/>';
        }
        echo '<br/>----------------------<br/>';
        return ;

        echo '<br/>';echo '<br/>';echo '<br/>';
        movie::chunk(1, function ($movies) {
            foreach ($movies as $movie) {
                echo $movie->title . '   ';
                echo $movie->actor->name;
                echo '<br/>';
            }
        });
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cars = array("Alabama"=>"Alabama" , "Alaska"=>"Alaska", "California"=>"California", "Delaware"=>"Delaware", "Tennessee"=>"Tennessee", "Texas"=>"Texas", "Washington"=>"Washington");

        return view('movie.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        print_r($request->input('sports'));
        foreach ($request->input('sports') as $tag){
            echo $tag;
        }
        echo $request->input('title');
        echo $request->input('desc');
        echo $request->input('date');
        echo $request->input('rate');
        return ;

        gettype($request);
        echo '<br/>';
        echo $request->getMethod();
        echo '<br/>';
        echo gettype($request);
        echo '<br/>';

        $stack = array();


        foreach ($request as $tag){
            array_push($stack, $tag);
        }
        return $stack;
        
        foreach ($request->input('sports') as $tag){
            echo $tag;
            echo '<br/>----';
        }


        $data = $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'date' => 'required',
            'rate' => 'required',
            'actor_id' => 'required',
        ]);
        movie::create($data);
        return redirect('/movie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $movie = movie::with('actor')->find($id);
        // return $movie->attributesToArray();
        // $movie = movie::find($id)->with('actor');
        return view('movie.show', compact('movie'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $movie = movie::where('id', $id)->get();
        //echo $movie->title . '   ';
        // return $movie;

        $movie = movie::with('actor')->find($id);
        // $movie = movie::find($id)->with('actor');
        return view('movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $data = $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'date' => 'required',
            'rate' => 'required',
            'actor_id' => 'required',
        ]);
        
        movie::where('id', $id)->update($data);
        return redirect('/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = movie::find($id);
        $data->delete();
        return redirect('/view');
    }
}
