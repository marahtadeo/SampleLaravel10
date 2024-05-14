<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Users::get();
        return view('user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        
        if($req->input('action_type') == 'Add'){
             $new = Users::where('FirstName', $req->input('user_fname'))
        ->where('LastName', $req->input('user_lname'))
        ->get();
    
        if (count($new) == 0) {
            Users::insert( ['FirstName' => $req->input('user_fname'), 
            'LastName' => $req->input('user_lname'), 
            'Nickname' => $req->input('user_nickname'), 
            'Age' => (int)$req->input('user_age'), 
            'CreatedAt' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'), 
            'UpdatedBy' => 'Admin']);
            return Redirect::back()->with('success', 'Success!');
        } else {
            return Redirect::back()->withErrors(['Already Exists!']);
        };
        }else{
            Users::where( 'ID', $req->input('user_ID'))
            ->update(
            ['FirstName' => $req->input('user_fname'), 
            'LastName' => $req->input('user_lname'), 
            'Nickname' => $req->input('user_nickname'), 
            'Age' => (int)$req->input('user_age'), 
            'UpdatedBy' => 'Admin']);
            return Redirect::back()->with('success', 'Success!');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Users::where('ID', $id)
        ->delete();
       
    }
}
