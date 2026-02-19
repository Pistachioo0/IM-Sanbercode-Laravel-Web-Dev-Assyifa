<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function setProfile() {
        $currentUser = Auth::user();

        $user = User::find($currentUser->id);
        if($user->profile) {
            $profile = Profile::where('user_id', $user->id)->first();
            return view('profile.update', ['profile' => $profile]);
        } else {
            return view('profile.add');
        }
    }

    public function store(Request $data) {
        $data->validate([
            'age' => 'required',
            'bio' => 'required',
        ]);

        $currentUser = Auth::user();

        $prof = new Profile;
        $prof->age = $data->input('age');
        $prof->bio = $data->input('bio');
        $prof->user_id = $currentUser->id;
        $prof->save();

        return redirect('/profile')->with('success', 'Berhasil buat Profile!');
    }

    public function update(Request $data) {
        $data->validate([
            'age' => 'required',
            'bio' => 'required',
        ]);

        $userS = Auth::user();
        $prof = Profile::where('user_id', $userS->id)->first();

        $prof->age = $data->input('age');
        $prof->bio = $data->input('bio');
        $prof->user_id = $userS->id;
        $prof->save();

        return redirect('/profile')->with('success', 'Berhasil update Profile!');
    }
}
