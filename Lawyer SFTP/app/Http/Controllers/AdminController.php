<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Admin;
use Storage;

class AdminController extends Controller{

    public function index(Request $request){
        $admin = Admin::where('role','=', 'ADMIN')->where( function ($query) use ($request)
        {
            $query->where('email', 'ilike', '%'.$request->search.'%');
            $query->orWhere('username', 'ilike', '%'.$request->search.'%');
            $query->orWhere('telp', 'ilike', '%'.$request->search.'%');
        })->orderBy('id', 'desc')->paginate(10);
        return view('admin.index', compact('admin'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'username'  => 'required|unique:admin',
            'email'     => 'required|unique:admin',
            'telp'      => 'required|unique:admin',
            'avatar'    => 'required|max:2024',
            'password'  => 'required|confirmed|min:6',
        ],
        [
            'username'              => 'Username sudah digunakan',
            'email'                 => 'Email sudah digunakan',
            'telp'                  => 'Telp sudah digunakan',
            'avatar.max'            => 'Ukuran File Max 2 mb',
            'password.confirmed'    => 'Password Tidak Sama',
            'password.min'          => 'Password Min 6 Karakter',
        ]);
        $avatar = $request->file('avatar')->store('avatar');
        Admin::create([
            'username'   => strtolower($request->username),
            'avatar' => $avatar,
            'email'  => $request->email,
            'telp'   => $request->telp,
            'role'   => 'ADMIN',
            'password'=> Hash::make($request->password)
        ]);

        return redirect('admin')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Admin $admin)
    {
        return $admin;
    }

    public function update(Request $request, Admin $admin)
    {
        if($request->avatar){
            $avatar = $request->file('avatar')->store('avatar');
            if(Storage::exists($admin->avatar)){
                Storage::delete($admin->avatar);
            }
        }else{
            $avatar = $admin->avatar;
        }
        $admin->update(array_merge($request->all(), [
            'avatar' => $avatar
        ]));
        
        if(request()->is('admin')){
            return redirect('admin')->with('success', 'Data berhasil diubah');
        }else{
            return redirect()->back()->with('success', 'Data berhasil diubah');
        }
    }
    
    public function destroy(Admin $admin)
    {
        $admin->delete();
        if(Storage::exists($admin->avatar)){
            Storage::delete($admin->avatar);
        }
    }

    public function change(Request $request, $id)
    {
        $this->validate($request, [
            'password'  => 'required|confirmed|min:6',
        ],
        [
            'password.confirmed'    => 'Password Tidak Sama',
            'password.min'          => 'Min 6 Karakter',
            ]);
        
            Admin::where('id', $id)->update([
                'password'=> Hash::make($request->password)
        ]);
        if(request()->is('admin')){
            return redirect('admin')->with('success', 'Password berhasil diubah');
        }else{
            return redirect()->back()->with('success', 'Password berhasil diubah');
        }
    }
}
