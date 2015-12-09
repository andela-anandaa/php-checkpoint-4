<?php

namespace KnowTube\Http\Controllers\User;

use Auth;

use Illuminate\Http\Request;

use KnowTube\Http\Requests;
use KnowTube\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * display form to edit profile
     * 
     * @return view
     */
    public function getEditProfile()
    {
        return view('profile.editor');
    }

    /**
     * update user profile
     * 
     * @param  Requests\ProfileChangeRequest $request
     * @return redirect to home page
     */
    public function postEditProfile(Requests\ProfileChangeRequest $request)
    {
        $user = Auth::user();

        $user->fill($request->all());

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar->move('uploads/', $avatar->getClientOriginalName());
            $user->avatar = url('/') . '/uploads/' . $avatar->getClientOriginalName();
        }

        $user->save();

        return redirect('/');
    }
}
