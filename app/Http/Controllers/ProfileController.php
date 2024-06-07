<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller {
    public function index() {
        $idUser = Auth::id();
        $profile = Profile::where('users_id', $idUser)->first();
        return view('profile.update', ["profile" => $profile]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'umur' => 'required',
            'bio' => 'required',
            'alamat' => 'required',
        ]);

        Profile::where('id', $id)
            ->update([
                'umur' => $request->input('umur'),
                'bio' => $request->input('bio'),
                'alamat' => $request->input('alamat'),
            ]);
            session()->flash('success', 'Profile updated successfully.');
        return redirect('/profile');
    }
    
}
