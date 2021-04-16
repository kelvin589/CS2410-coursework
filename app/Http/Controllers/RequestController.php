<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RequestController extends Controller
{
    /**
     * Display a listing of the pending requests
     */
    public function listPending()
    {
        // 'admin' can view all pending requests
        $requests = RequestModel::joinTables()->pending()->sortable()->paginate(7);

        // 'user' can only view their pending requests
        if(Gate::denies('admin-functionality'))
        {
            $requests = RequestModel::userID(Auth::id())->joinTables()->pending()->sortable()->paginate(7);
        }

        return view('requests.pending', compact('requests'));
    }

    /**
     * Update the request status for a request. 
     * Request approval:
     *  update all animal id associated requests to denied,
     *  set required one to approved, and
     *  set animal's user_id to adopter's id
     * Request denied:
     *  update request status to denied
     */
    public function updateRequestStatus(Request $request, $id) 
    {
        Gate::authorize('admin-functionality');
        $adoption_request = RequestModel::find($id);
        $animal_id = $adoption_request->animal_id;
        $user_id = $adoption_request->user_id;

        switch($request->submitButton) {
            case 'Approve':
                try {
                    // Since these queries must all be successfully committed,
                    // a transaction has been used as any error within it will be rolled back.
                    DB::transaction(function() use($animal_id, $adoption_request, $user_id) {
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
                    });
                } catch(\Exception $exception) {
                    return redirect('/requests/pending')->with('failure', 'An error occured. This transaction has not been saved.');
                }  
            break;

            case 'Deny':
                $adoption_request->adoption_status = 'denied';
                $adoption_request->save();
            break;
        }

        return redirect('/requests/pending')->with('success', 'Status has been updated');
    }

    /**
     * Add a new request for adoption to the requests table.
     */
    public function addAdoptionRequest(Request $request, $id)
    {
        $animal_id = $request->id;
        if (Auth::check()) {
            $user_id = Auth::id();
            $request = new RequestModel();

            $request->animal_id = $animal_id;
            $request->user_id = $user_id;
            $request->save();

            return redirect('/animals/available')->with('success', 'Animal has been requested for adoption.');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 'admin' request shows all requests
        $requests = RequestModel::joinTables()->sortable()->paginate(7);

        // 'user' request shows only requests associated with their id
        if(Gate::denies('admin-functionality'))
        {
            $requests = RequestModel::userID(Auth::id())->joinTables()->sortable()->paginate(7);
        }

        return view('requests.index', compact('requests'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requestRecord = RequestModel::find($id);
        $request_user_id = $requestRecord->user_id;

        // Only allow admins or the user who made the request to view request details
        if (Gate::denies('admin-functionality')) {
            Gate::authorize('current-user', $request_user_id);
        }
        
        $request_animal_id = $requestRecord->animal_id;
        $request = RequestModel::animalIDUserID($request_animal_id, $request_user_id)->joinTables()->get()->first();
        return view('requests.show', compact('request'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = RequestModel::find($id);
        $request_user_id = $request->user_id;

        // Only allow admins or the user who made the request to delete request details
        if (Gate::denies('admin-functionality')) {
            Gate::authorize('current-user', $request_user_id);
        }

        $request->delete();
        return redirect(url()->previous())->with('success', 'The adoption request has been cancelled.');
    }
}
