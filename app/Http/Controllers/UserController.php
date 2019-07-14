<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index')->with(compact('users'));
    }

    // show creation form
    public function create()
    {
        return view('users.create');
    }

    // Submit creation form
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name'                  => 'required',
            'password'              => 'required|min:6|max:20|confirmed',
            'email'                 => 'unique:users,email,$this->id,id|required'
        ]);

        // if validation passes, insert product into db
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        flash('created user successfully')->success();

        return redirect('/users');
    }

    //load edit form for User
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit')->with(compact('user'));
    }

    public function editPassword($id)
    {
        $user = User::findOrFail($id);

        return view('users.editPassword')->with(compact('user'));
    }

    // submit edit form
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        User::where('id', $id)->update([
            'name'  => $request->input('name')
        ]);

        flash('edited user successfully')->success();

        return redirect('/users');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
           'password'   => 'required|confirmed|min:6|max:20'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'password'  => Hash::make($request->input('password'))
        ]);
        flash('changed '.$user->name.'\'s password successfully')->success();
        return redirect('/users');
    }

    // delete User
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->products->count() == 0 )
        {
            $user->delete();
            flash('deleted successfully')->success();
        }
        else
        {
            flash('can\'t delete user because it is associated with products')->warning();
        }

        return redirect('/users');
    }
}
