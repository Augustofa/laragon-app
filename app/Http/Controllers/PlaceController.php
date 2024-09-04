<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePlaceRequest;
use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Place $place)
    {
        $places = $place->all();
        return view('place.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('place.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->store('public/images/places');

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/images/places');
        //     $validatedData['image_path'] = $imagePath;
        // }

        // $validatedData = $request->validate([
        //     'author_id' => 'required|max:255',
        //     'latitude' => 'required|numeric',
        //     'longitude' => 'required|numeric',
        //     'name' => 'required|max:255',
        //     'location' => 'required|max:255',
        //     'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'description' => 'required',
        // ]);
        
        // $request->merge(['image_path' => $image]);
        // $place = Place::create($request->validated());

        $place = new Place();
        $place->author_id = $request->author_id;
        $place->latitude = $request->latitude;
        $place->longitude = $request->longitude;
        $place->name = $request->name;
        $place->location = $request->location;
        $place->image_path = $image;
        $place->description = $request->description;
        $place->save();
        

        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $place = Place::find((int)$id);
        if (!isset($place)) {
            return back();
        }

        return view('place.show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $place = Place::find((int)$id);
        if(!isset($place)){
            return back();
        }
        return view('place.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $oldPlace = Place::find((int)$id);
        if(!isset($oldPlace)){
            return back();
        }

        $newPlace = new Place();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/images/places');
            $newPlace->image_path = $image;
        }else{
            $newPlace->image_path = $oldPlace->image_path;
        }
           
        $newPlace->author_id = $request->author_id;
        $newPlace->latitude = $request->latitude;
        $newPlace->longitude = $request->longitude;
        $newPlace->name = $request->name;
        $newPlace->location = $request->location;
        $newPlace->description = $request->description;
       
        $oldPlace->update($newPlace->toArray());
        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
