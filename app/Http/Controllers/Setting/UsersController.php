<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\ModelHasRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        $users = User::get();
        $judul = "Users";

        return view('settings.users.index', compact('roles', 'users', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role_id' => 'required|exists:roles,name',
            'password' => ['required', Password::defaults()],
        ]);
        $user = User::create($request->all());
        $role = Role::findByName($request->role_id);
        ModelHasRole::firstOrCreate(['model_uuid' => $user->id], [
            'role_id' => $role->id,
            'model_uuid' => $user->id,
            'model_type' => User::class,
        ]);

        return redirect()->back()->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role_id' => 'required|exists:roles,name',
        ]);
        $request->request->remove('password');
        $user = User::findOrFail($id);
        $user->update($request->all());
        $role = Role::findByName($request->role_id);
        ModelHasRole::where('model_uuid', $user->id)->update([
            'role_id' => $role->id,
        ]);

        return redirect()->back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        ModelHasRole::where('model_uuid', $user->id)->delete();
    }
}
