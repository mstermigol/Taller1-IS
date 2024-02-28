<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['reviews'] = Review::all();

        return view('review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $viewData = [];
            $review = Review::findOrFail($id);
            $viewData['title'] = $review['title'].' - Temporal Adventure';
            $viewData['subtitle'] = $review['title'].' - Review information';
            $viewData['review'] = $review;

            return view('review.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect('/');
        }
    }

    public function create(): View
    {

        return view('review.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        Review::create($request->only(['title', 'description', 'rating']));

        return view('review.save');
        //here will be the code to call the model and save it to the database
    }

    public function delete(int $id)
    {
        try {
            $order = Review::findOrFail($id);
            $order->delete();
        } catch (Exception $e) {
            return redirect('/reviews');
        }

        return redirect('/reviews');
    }
}
