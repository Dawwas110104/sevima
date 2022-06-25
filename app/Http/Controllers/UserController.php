<?php
namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\ClassUser;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        return view('pages.user.index', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        $roles = Role::all();

        return view('pages.user.edit')->with([
            'item' => $item,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);

        $roleId = $request->role;
        $user = User::where('id', $id)->first();
        $roleUser = RoleUser::where('user_id', $user->id)->first();

        if (is_null($roleUser)) {
            RoleUser::create([
                'role_id' => $roleId,
                'user_id' => $user->id,
            ]);
        } else {
            RoleUser::where('id',$roleUser->id)->update([
                'role_id' => $roleId,
            ]);
        };
        

        $item->update($data);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index');
    }

    public function class($id)
    {
        $user = User::findOrFail($id);
        $items = ClassUser::where('user_id', $id)->get();
        $classes = Clas::all();

        return view('pages.user.class',[
            'user' => $user,
            'items' => $items,
            'classes' => $classes,
        ]);
    }

    public function classUpdate(Request $request)
    {
        return $request;
    }

    public function classDestroy($id)
    {
        $item = ClassUser::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index');
    }
}
