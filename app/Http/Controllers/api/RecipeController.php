<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\Recipe as RecipeResource;
use App\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RecipeResource::collection(Recipe::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string',
            'content'   => 'required|string',
        ]);

        return Recipe::create([ 
                'title'     => $request->title,
                'content'   => $request->content,
                'user_id'   => 1//auth()->id()
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new RecipeResource(Recipe::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required|string',
            'content'   => 'required|string',
        ]);

        $recipe = Recipe::find($id);

        $recipe->title      = $request->title;
        $recipe->content    = $request->content;
        $recipe->save();

        return $recipe;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipe::destroy($id);
        return response()->json([ 'message' => 'recipe deleted' ]);
    }
}
