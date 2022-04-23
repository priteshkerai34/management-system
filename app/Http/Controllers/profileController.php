<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\profile;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Response;

class profileController extends AppBaseController
{
    public function index(Request $request)
    {
        $profiles = profile::all();

        return view('profiles.index')
            ->with('profiles', $profiles);
    }
    public function create()
    {
        return view('profiles.create');
    }
    public function store(Request $request)
    {
        $profiles = new profile();
        $profiles->name = $request->name;
        $profiles->email = $request->email;
        $profiles->number = $request->number;
        $profiles->password = Hash::make($request->password);
        $profiles->save();

        Flash::success('Profile saved successfully.');

        return redirect(route('profiles.index'));
    }
    public function edit($id)
    {
        $profile = profile::find($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.edit',compact('profile'));
    }

    public function update($id,Request $request)
    {
        $profile = profile::find($id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->number = $request->number;
        $profile->password = Hash::make($request->password);
        $profile->save();

        Flash::success('Profile updated successfully.');

        return redirect(route('profiles.index'));
    }

    public function show($id)
    {
        $profiles = profile::find($id);

        if (empty($profiles)) {
            Flash::error('profiles not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.show')->with('profiles', $profiles);
    }

    public function destroy($id)
    {
        $profiles = profile::find($id);

        if (empty($profiles)) {
            Flash::error('profiles not found');

            return redirect(route('profiles.index'));
        }

        profile::destroy($id);

        Flash::success('profiles deleted successfully.');

        return redirect(route('profiles.index'));
    }
}
