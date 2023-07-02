<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gig;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class LaragigController extends Controller
{
    //
    public function index(Request $request)
    {
        $search_category = $request->query() ? $request->query()['search_category'] : null;
        if ($search_category != null) {
            $gigs = Gig::with('categories')->where('category_id', $search_category)->get()->paginate(6);
            
            $categories = Category::all();
            return view('gigs.laragig', ['gigs' => $gigs, 'categories' => $categories]);
        };
        // if ($search_category != null) {
        //     dd($search_category);
        // }

        $gigs = Gig::latest()->paginate(6);
        $categories = Category::all();
        return view('gigs.laragig', ['gigs' => $gigs, 'categories' => $categories]);
    }
    public function show()
    {
        $tags = Category::all();
        return view('gigs.create', ['tags' => $tags]);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('create')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
        $validated['user_id'] = auth()->id();
        $tags = $validated['tags'];
        unset($validated['tags']);

        $gig = new Gig($validated);
        $gig->save();

        foreach ($tags as $tag) {
            $gig->categories()->attach($tag);
        }



        return redirect('gigs')->with('message', 'Gig is created!');
    }
    public function single(Request $request, string $id)
    {
        $gig = Gig::where('id', $id)->first();
        if ($gig == null) {
            abort(404);
        }
        return view('gigs.single', ['gig' => $gig]);
    }
    public function myGigs()
    {
        $gigs = Gig::where('user_id', auth()->user()->id)->latest()->paginate(6);

        return view('gigs.mygigs', ['gigs' => $gigs]);
    }
    public function editShow(string $id)
    {
        $gig = Gig::where('id', $id)->first();
        $tags = Category::get();
        if ($gig == null) {
            abort(404);
        }
        return view('gigs.edit', ['gig' => $gig, 'tags' => $tags]);
    }
    public function edit(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/gigs/mine')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validated();
        $validated['user_id'] = auth()->id();
        $tags = $validated['tags'];
        unset($validated['tags']);
        $gig = Gig::where('id', $id)->first();
        $gig->categories()->detach();
        foreach ($tags as $tag) {
            $gig->categories()->attach($tag);
        }
        if ($gig->update($request->all()) === false) {
            return back();
        }
        return back();
    }
}
