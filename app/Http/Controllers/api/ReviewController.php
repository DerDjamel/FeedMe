<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\Review as ReviewResource;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // no need for all the reviews now
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
            'content'   => 'required|string',
        ]);

        return Review::create([ 
                'content'   => $request->content,
                'user_id'   => $request->user_id,//auth()->id(),
                'recipe_id' => $request->recipe_id // this just for testing
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
        return new ReviewResource(Review::find($id));
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
            'content'   => 'required|string',
        ]);

        $review = Review::find($id);

        $review->content = $request->content;
        $review->save();

        return $review;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::destroy($id);
        return response()->json([ 'message' => 'Review deleted' ]);
    }
}
