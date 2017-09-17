<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use Illuminate\Http\Request;

class BusinessController extends Controller
{

    public function list()
    {
        $businesses = Business::paginate(10);
        return view('business.list')->with('businesses', $businesses);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->input('q') == null)
        {
          return view('business')
            ->with('noResult', true)
            ->with('isSearching', false);
        }

        if($request->input('q') !== null && strlen($request->input('q')) > 0 )
        {
          $query = $request->input('q');

          $businesses = Business::where('title', 'like', "%$query%")
            ->orWhere('address', 'like', "%$query%")
            ->orWhere('cep', 'like', "%$query%")
            ->orWhere('city', 'like', "%$query%")
            ->orWhereHas('categories', function($q) use($query){
                $q->where('name', 'like', "%$query%");
              })->paginate(10);

          $noResults = !($businesses->count() > 0);

          return view('business')
            ->with('query', $query)
            ->with('businesses', $businesses)
            ->with('isSearching', true)
            ->with('noResult', $noResults);
        }

          return view('business')
            ->with('noResult', true)
            ->with('isSearching', false);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $businesses = Business::setEagerLoads([])->paginate(10);
        $categories = Category::all();
        return view('business.create')
          ->with('businesses', $businesses)
          ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $business = new Business([
          "title" => $request->input('title'),
          "phone" => $request->input('phone'),
          "address" => $request->input('address'),
          "cep" => $request->input('cep'),
          "city" => $request->input('city'),
          "state" => $request->input('state'),
          "description" => $request->input('description'),
        ]);

        $business->save();

        $categories = $request->input('categories');

        foreach ($categories as $id) {
            $business->categories()->attach($id);
        }

        $business->save();

        return redirect()->route('business.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request
     * @return view
     */
    public function show($id)
    {
      $categories = Category::all();
      $business = Business::with('categories')->find($id);

      return view('business.overview')
        ->with('business', $business)
        ->with('categories', $categories);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $business = Business::with('categories')->find($id);

        return view('business.edit')
          ->with('business', $business)
          ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $business = Business::find($id);
        $business->update($request->all());
        $business->categories()->sync($request->input('categories'));
        $business->save();

        // return redirect()->route('business.list');
        return redirect()->route('business.detail', ['id' => $business->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $business = Business::find($id);
      $business->categories()->detach();
      $business->delete();

      return response('Deleted', 200);
    }
}
