<?php

namespace App\Http\Controllers;

use App\Http\Requests\addUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $user;
    protected $comments;

    public function __construct(User $user)
    {
        //MODEL DE USER. DECLARANDO NO CONSTRUTOR COMO USER
        $this->user = $user;
    }
    public function index(Request $request) {
        $users = $this->user
            ->getUsers(
                search: $request->search ?? ''
            );
            
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show($id) { 
        $user = $this->user->find($id);

        return view('users.show', [
            'user' => $user
        ]);
    }

    public function create() {
        return view('users.form');
    }

    public function add(addUpdateUserFormRequest $request) {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if ($request->image != '') {
            $data['image'] = $request->image->store('users');
        }

        $this->user->create($data);
        return redirect()->route('users.index');
    }

    public function edit($id) {
        $user = $this->user->find($id);
        if(!$user) {
            return redirect()->route('users.index');
        }
        return view('users.edit', compact('user'));
    }

    public function editAction(addUpdateUserFormRequest $request, $id) {
        $user = $this->user->find($id);
        if(!$user) {
            return redirect()->route('users.index');
        }
        
        if($request->password !== "") {
            $data = $request->all('name', 'email');
            $data['request'] = bcrypt($request->password);

            if($request->image) {
                if($user->image && Storage::exists($user->image)) {
                    Storage::delete($user->image);
                }

                $data['image'] = $request->image->store('users');
            }
            $user->update($data);
        }
        return redirect()->route('users.index');
    }

    public function details($id) {
        $user = $this->user->find($id);
        if(!$user) {
            return redirect()->route('users.index');
        }
        return view('users.details', [
            'user' => $user
        ]);
    }

    public function delete($id) {
        $user = $this->user->find($id);
        if(!$user) {
            return redirect()->route('users.index');
        }

        $user->delete();
        return redirect()->route('users.index');
    }
}
