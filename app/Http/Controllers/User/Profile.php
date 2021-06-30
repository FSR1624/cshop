<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Profile extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        if (Gate::allows('is-user')){
            session()->flash('success', 'Uredili ste profil.');
            return view('user.profile');
        }

        return redirect('/');

    }
}
