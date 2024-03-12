<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // index
    public function index(Request $request)
    {
        $users = DB::table('users')->paginate(10);
        return view('pages.users.index', compact('users'));
    }


    // Create
    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,staff,user',
        ]);
    }

    public function show($id)
    {
        return view('pages.users.show');
    }

    public function edit($id)
    {
        return view('pages.users.edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users' . $id,
            'role' => 'required|in:admin,staff,user',
        ]);
    }

    public function destroy($id){

    }


}
