<?php

namespace App\Http\Controllers;

use App\Award;
use App\Category;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Award Controller
 * @package App\Http\Controllers
 */
class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $awards = Award::all();
        return view("admin.awards.index", ['awards' => $awards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.awards.create", ['categories' => $categories]);
    }

    /**
     * Shows view where administrator can assign award to work
     *
     * @param Award $award
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function give(Award $award)
    {

        $works = Work::where('category_id', $award->category->id)->get();
        return view('admin.awards.give', ['works' => $works, 'award' => $award]);
    }


    /**
     * Sets given award to work
     *
     * @param Request $request
     * @param Award $award
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setWork(Request $request, Award $award)
    {

        if ($request['work'] > 0) {
            $validated = $request->validate([
                'work' => 'required|integer|exists:works,id'
            ]);
            $award->work_id = $validated['work'];
            $award->save();
        } else {
            $award->work_id = null;
            $award->save();
        }


        return redirect()->route('awards.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'place' => 'required|integer|min:1',
            'description' => 'string|nullable',
            'category' => 'required|integer|exists:categories,id',
        ]);

        Award::create([
            'name' => $validatedData['name'],
            'place' => $validatedData['place'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category']
        ]);

        return redirect()->route('awards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Award $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        return view("admin.awards.show", ['award' => $award]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Award $award
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award)
    {
        $categories = Category::all();
        return view("admin.awards.edit", ['award' => $award, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Award $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'place' => 'required|integer|min:1',
            'description' => 'string|nullable',
            'category' => 'required|integer|exists:categories,id',
        ]);

        $award->name = $validatedData['name'];
        $award->place = $validatedData['place'];
        $award->description = $validatedData['description'];
        $award->category_id = $validatedData['category'];
        $award->save();
        return redirect()->route('awards.index');


    }

    /**
     * Removes given award from database
     *
     * @param Award $award
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Award $award)
    {
        $award->delete();
        return back();
    }
}
