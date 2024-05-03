<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list(){
        $data['header_title'] = 'Admin';
        $data['users'] = User::getAdmin();
        return view('admin.admin.list', $data);
    }


    public function add(){
        $data['header_title'] = 'Add  New Admin';
        return view('admin.admin.add',$data);
    }

    public function insert(Request $request) {
        request()->validate([
            'email' => 'required | email | unique:users',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return redirect()->route('adminList')->with('success', 'User created successfully!');
    }

    public function edit($id){
        $data['header_title'] = 'Edit Admin';
        $data['user'] = User::getSingle($id);
        return view('admin.admin.edit',$data);
    }

    public function update($id,Request $request) {
        request()->validate([
            'email' => 'required | email | unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return redirect()->route('adminList')->with('success', 'User Updated successfully!');
    }

    public function delete($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->back()->with('success', 'User Deleted successfully!');
    }

}
