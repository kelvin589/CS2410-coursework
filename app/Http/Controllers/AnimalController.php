<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class AnimalController extends Controller
{
    /**
     * List all available animals
     */
    public function listAvailableAnimals()
    {
        $animals = Animal::available()->sortable()->paginate(7);
        return view('animals.available', compact('animals'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('admin-functionality');
        $animals = Animal::joinTables()->sortable()->paginate(7);
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin-functionality');
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
        Gate::authorize('admin-functionality');
        // Form validation
        $animal = $this->validate(request(), [
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'type' => [
                'required', 
                Rule::in(['mammal', 'bird', 'reptile', 'amphibian', 'fish', 'invertebrate'])
            ],
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
        $animal->type = $request->input('type');
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
        Gate::authorize('admin-functionality');
        $animal = Animal::find($id);
        $username = User::find($animal->user_id)->name ?? "Not Adopted";
        return view('animals.show', compact('animal', 'username'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('admin-functionality');
        $animal = Animal::find($id);
        return view('animals.edit', compact('animal'));
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
        Gate::authorize('admin-functionality');
        // Retrieve existing animal
        $animal = Animal::find($id);

        // Form validation
        $this->validate(request(), [
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'type' => [
                'required', 
                Rule::in(['mammal', 'bird', 'reptile', 'amphibian', 'fish', 'invertebrate'])
            ],
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

        // Update the record
        $animal->name = $request->input('name');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->type = $request->input('type');
        $animal->description = $request->input('description');
        $animal->image = $filenameToStore;

        // Save Animal object
        $animal->save();
        // Generate a redirect HTTP response with success message
        return redirect('animals')->with('success', 'Animal has been updated');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('admin-functionality');
        $animal = Animal::find($id);
        $animal_name = $animal->name;
        $animal->delete();
        return redirect('animals')->with('danger', 'The animal, ' . $animal_name . ', has been deleted');
    }
}
