<?php

namespace Anjalicct\User\controllers;

use Anjalicct\User\models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::latest()->paginate(5);
        return view('users::index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'is_admin' => 'required',
            'role_id' => 'required',
        ]);

        $data = Users::create($request->all());

        if ($request->hasFile('user_image')) {

            $image = $request->file('user_image');
            $name = $data->id . '_' . time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/user_images/'. $data->id) , $name);
        }

        Users::where('id', $data->id)->update(['user_image' => $name]);

        return redirect()->route('users.index')->with('success', 'User created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * use Anjalicct\User\models\Users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::find($id);
        return view('users::show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * use \Anjalicct\User\models\Users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::find($id);
        return view('users::edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * use  \App\Models\Users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Users::find($id);
        $old_image = $user->user_image;
        $file_path = '/user_images/' . $user->id . '/' .  $user->user_image;
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'is_admin' => 'required',
            'role_id' => 'required',
        ]);

        $user->update($request->all());

        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $name = $user->id. '_' .time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/user_images/' . $user->id) , $name);

            if(File::exists(public_path($file_path))){
                File::delete(public_path($file_path));
            }

            $user->update(['user_image' => $name]);

        }else{
            $user->update(['user_image' => $old_image]);
        }

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
