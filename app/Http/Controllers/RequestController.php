<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RequestController extends Controller
{
    /**
     * Display a listing of the pending requests
     */
    public function listPending()
    {
        $requests = RequestModel::joinTables()->pending()->get();
        return view('/requests/index', array('requests' => RequestModel::joinTables()->pending()->get(), 'showAction' => true));
    }

    public function updateRequestStatus(Request $request, $id) 
    {
        $adoption_request = RequestModel::find($id);
        $animal_id = $adoption_request->animal_id;
        $user_id = $adoption_request->user_id;

        switch($request->submitButton) {
            case 'Approve':
                // Update all the requests, for the same animal, to denied
                RequestModel::pending()
                            ->animalID($animal_id)
                            ->update(['adoption_status' => 'denied']);
                // Update the current request record to approved
                $adoption_request->adoption_status = 'approved';
                $adoption_request->save();
                // Update availability of animal and user_id (the owner) of animal
                Animal::find($animal_id)
                        ->update(['available' => '0', 'user_id' => $user_id]);
            break;

            case 'Deny':
                $adoption_request->adoption_status = 'denied';
                $adoption_request->save();
            break;
        }
        return redirect('/requests/pending')->with('success', 'Status has been updated');
    }

    public function updateRequestAdoption(Request $request, $id)
    {
        $animal_id = $request->id;
        if (Auth::check()) {
            $user_id = Auth::id();
        }

        $request = new RequestModel();
        $request->animal_id = $animal_id;
        $request->user_id = $user_id;
        $request->save();

        return redirect('/displayAvailableAnimals')->with('success', 'Animal has been adopted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RequestModel::joinTables()->get();
        if(Gate::denies('displayall'))
        {
            //$requests = RequestModel::joinTables()->userID(Auth::id())->get();
            $requests = RequestModel::userID(Auth::id())->joinTables()->get();
        }
        $showAction = false;
        return view('requests.index', compact('requests', 'showAction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
