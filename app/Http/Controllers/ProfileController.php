<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Session;

class ProfileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $profiles = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profileView.main_page')->withProfiles($profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('profileView.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //return 'success '. json_encode($request->first_name);
        $this->validate($request, [
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'work_number' => 'required|min:4|max:10|regex:/^[0-9]+$/|unique:profile,work_number',
            'private_number' => 'required|min:4|max:10|regex:/^[0-9]+$/|unique:profile,private_number'
        ]);

        $profile = new Profile();

        $profile->first_name = ucfirst($request->first_name);
        $profile->last_name = ucfirst($request->last_name);
        $profile->work_number = $request->work_number;
        $profile->private_number = $request->private_number;
        $profile->save();

        if ($profile->save()) {
            //just for testing if ajax works corectly...
            //return response()->json(['success'=>'Added new records.']);
            Session::flash('success', 'The profile was added successfully!');
            return redirect()->route('show', $profile->id);
        } else {
            Session::flash('danger', 'Uable  to create profile');
            return redirect()->route('create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $profile = Profile::findOrFail($id);

        return view('profileView.show')->withProfile($profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $profile = Profile::findOrFail($id);

        return view('profileView.edit')->withProfile($profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $this->validate($request, [
            'first_name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            'work_number' => "required|min:4|max:10|regex:/^[0-9]+$/|unique:profile,work_number,$id",
            'private_number' => "required|min:4|max:10|regex:/^[0-9]+$/|unique:profile,private_number,$id"
        ]);

        $editedProfile = Profile::findOrFail($id);

        $editedProfile->first_name = ucfirst($request->first_name);
        $editedProfile->last_name = ucfirst($request->last_name);
        $editedProfile->work_number = $request->work_number;
        $editedProfile->private_number = $request->private_number;

        $editedProfile->save();

        if ($editedProfile->save()) {
            //just for  testing purpose for  ajax
            //return response ()->json ( $editedProfile );
            Session::flash('success', 'The profile was edited successfully!');
            return redirect()->route('show', $editedProfile->id);
        } else {
            Session::flash('danger', 'Unable to  edit the profile...try again later.');
            return redirect()->route('update', $editedProfile->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('index')->with([
                    'flash_message' => 'The profile was deleted  successufully!',
                    'flash_message_important' => false
        ]);
    }

}
