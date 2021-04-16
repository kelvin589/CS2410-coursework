<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class AnimalController extends Controller
{
    /**
     * List the animals adopted by the logged in user
     */
    public function listUserAdoptedAnimals(Request $request) 
    {
        // Flash current input (remember old type value for setting select tag's value)
        $request->flash();
        $animals = $this->queryAnimalType(Animal::userAdopted(Auth::id()), $request->type);
        
        return view('animals.adopted', compact('animals'));
    }

    /**
     * List all available animals
     */
    public function listAvailableAnimals(Request $request)
    {
        // Flash current input (remember old type value for setting select tag's value)
        $request->flash();
        $animals = $this->queryAnimalType(Animal::available(), $request->type);

        return view('animals.available', compact('animals'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('admin-functionality');
        // Flash current input (remember old type value for setting select tag's value)
        $request->flash();
        $animals = $this->queryAnimalType(Animal::joinTables(), $request->type);

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

        // Create Animal object and set values from input
        $animal = new Animal();
        $animal->name = $request->input('name');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->type = $request->input('type');
        $animal->description = $request->input('description');
        $animal->image = implode("|", $this->handleImages($request));

        // Save Animal object
        $animal->save();
        // Generate a redirect HTTP response with success message
        return back()->with('success', 'Animal has been added.');
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
        $username = User::find($animal->user_id)->username ?? "Not Adopted";
        
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

        // Update the record
        $animal->name = $request->input('name');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->type = $request->input('type');
        $animal->description = $request->input('description');
        $animal->image = implode("|", $this->handleImages($request));

        // Save Animal object
        $animal->save();
        // Generate a redirect HTTP response with success message
        return redirect('animals')->with('success', 'Animal has been updated.');
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

        return redirect('animals')->with('danger', 'The animal, ' . $animal_name . ', has been deleted.');
    }

    /**
     * Return sortable query where type is the given parameter type
     */
    private function queryAnimalType($query, $type) 
    {
        $types = ['mammal', 'bird', 'reptile', 'amphibian', 'fish', 'invertebrate'];

        if (in_array($type, $types)) {
            $query->where('type', '=', $type);
        }
        
        return $query->sortable()->paginate(7);
    }

    /**
     * Handle the input of images by returning an string array of image names
     */
    private function handleImages(Request $request)
    {
        $images = array();

        // Handle image uploading
        if ($request->hasFile('images')) {
            foreach($request->images as $image) {
                // Filename + extension
                $filenameWithExtension = $image->getClientOriginalName();
                // Filename
                $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                // Extension
                $extension = $image->getClientOriginalExtension();
                // Filename to store = filename_time.extension
                $filenameToStore = $filename.'_'.time().'.'.$extension;

                // Upload image
                $path = $image->storeAs('public/images', $filenameToStore);
                // Add to images array
                $images[] = $filenameToStore;
            }    
        } else {
            $images[] = 'noimage.jpg';
        }

        // Return string array of image's filename+extension
        return $images;
    }
}
