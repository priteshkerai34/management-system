<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\profile;
use Illuminate\Http\Request;
use Flash;
use Response;

class profileController extends AppBaseController
{
    public function index(Request $request)
    {
        $profiles = profile::all();

        return view('profiles.index')
            ->with('profiles', $profiles);
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
