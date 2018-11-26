<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Sdm;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::where('flag',1)->with('sdm')->get();
        $sdm=Sdm::orderBy('nama_lengkap')->get();
        $level=level();
        return view('pages.master.user')->with('user',$user)->with('sdm',$sdm)->with('level',$level);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'flag' => 'required',
            'level' => 'required'
        ])->validate();

        $sdm=Sdm::where('nama_lengkap','=',$request->name)->first();

        $insert=new User;
        $insert->name = $request->name;
        $insert->id_sdm = $sdm->id;
        $insert->email = $request->email;
        $insert->password = bcrypt($request->password);
        $insert->flag = $request->flag;
        $insert->level = $request->level;
        $insert->save();

        return redirect('master-user')->with('success','Data User Berhasil Di Tambah');
    }

    
    public function edit($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'flag' => 'required',
            'level' => 'required'
        ])->validate();

        $sdm=Sdm::where('nama_lengkap','=',$request->name)->first();

        $insert=User::find($id);
        $insert->name = $request->name;
        $insert->email = $request->email;
        
        if(!is_null)
            $insert->id_sdm = $sdm->id;

        if($request->password!='')
            $insert->password = bcrypt($request->password);
        
        $insert->flag = $request->flag;
        $insert->level = $request->level;
        $insert->save();

        return redirect('master-user')->with('success','Data User Berhasil Di Perbaharui');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('master-user.index')
            ->with('success', 'Anda telah menghapus data.');
    }
}
