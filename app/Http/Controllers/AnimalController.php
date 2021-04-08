<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * List all the animals
     */
    public function listAnimals() 
    {
        return view('/animals', array('animals' => Animal::all()));
    }

    /**
     * List all available animals
     */
    public function listAvailableAnimals()
    {
        return view('/availableAnimals', array('animals' => Animal::available()->get()));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all()->toArray();
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $animal = $this->validate(request(), [
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'description' => 'sometimes|max:256',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        // Handle image uploading
        if ($request->hasFile('image')) {
            // Get filename with extension
            $filenameWithExtension = $request->file('image')->getClientOriginalName();
            // Just get filename
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            // Just get extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Upload image
            $path = $request->file('image')->storeAs('public/images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        // Create Animal object and set values from input
        $animal = new Animal();
        $animal->name = $request->input('name');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->description = $request->input('description');
        $animal->image = $filenameToStore;

        // Save Animal object
        $animal->save();
        // Generate a redirect HTTP response with success message
        return back()->with('success', 'animal has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('animals');
    }
}
