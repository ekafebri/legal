<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Validate;

use App\Artikel;
use App\Komentars;
use App\Likes;
use App\User;

use DB;
use File;
use Storage;

class ArtikelController extends Controller{
    
    public function all(Request $request){

        $artikel = DB::table('artikel')
        ->select('artikel.id', 'judul', 'image', 'release_date','users.nama_lengkap as author', 'sumber')
        ->join('users', 'users.id', '=', 'artikel.user_id')
        ->where('artikel.mode', 'RELEASE')
        ->orderBy('artikel.id', 'DESC')
        ->get();

        return response()->json(['message' => 'Data all Artikel','code' => 1, 'error' => false, 'artikel' => $artikel]);
    }
    
    public function detail(Request $request){
        $id = $request->artikel_id;
        if($id){
            $artikel = Artikel::select('id','judul', 'sumber', 'content', 'image', 'release_date', 'user_id')->where('id', $id)->withCount(['like', 'comment'])->first();
            $status = Likes::where('artikel_id', $id)->where('user_id', $request->user->id)->first();
            if($status){
                $status_like = true;
            }else{
                $status_like = false;
            }
            $author = User::select('nama_lengkap')->where('id', $artikel->user_id)->first();
            $comment = DB::table('komentars')
            ->select('komentars.id as komentar_id', 'komentar', 'nama_lengkap', 'komentars.created_at as comment_date', 'avatar')
            ->join('users', 'users.id', '=', 'komentars.user_id')
            ->where('komentars.artikel_id', $id)
            ->orderBy('komentar_id')
            ->get();
    
            if($artikel){
                return response()->json(['message' => 'Data Artikel','code' => 1, 'error' => false, 'author' => $author->nama_lengkap, 'status_like' => $status_like, 'artikel' => $artikel, 'comment' => $comment]);
            }else{
                return response()->json(['message' => 'Data Artikel tidak ada','code' => 0, 'error' => true ]);
            }
        }else{
            return response()->json(['message' => 'Parameter artikelId Tidak ada','code' => 2, 'error' => true ]);
        }
    }

    public function update(Request $request)
    {
        $id = $request->artikel_id;
        $artikel = Artikel::find($id);
        if($artikel->mode == 'RELEASE'){
            return response()->json(['message' => 'Artikel Sudah Release', 'code' => 0, 'error' => true]);
        }
        if($request->image){
            $fileexist = Storage::exists($artikel->image);
            if($fileexist){
                Storage::delete($artikel->image);
            }
            $image = $request->file('image')->store('artikel');
        }else{
            $image = $artikel->image;
        }
        
        if($request->mode == 'DRAF'){
            $required = Validate::required($request, ['judul', 'content', 'sumber']);
            if ($required) return $required;
            $date = '';
            $artikel->update(array_merge($request->all(), [
                'image'         => $image,
                'user_id'       => $request->user->id,
                'release_date'  => $date
            ]));
            return response()->json(['message' => 'Artikel berhasil disimpan','code' => 1, 'error' => false ]);
        }else{
            $required = Validate::required($request, ['judul', 'content', 'sumber', 'image']);
            if ($required) return $required;
            if(!in_array($request->mode, ['DRAF', 'RELEASE'])){
                return response()->json(['message' => 'Parameter mode salah','code' => 0, 'error' => true ]);
            }
            $date = date('Y-m-d', time());
            $artikel->update(array_merge($request->all(), [
                'image'         => $image,
                'user_id'       => $request->user->id,
                'release_date'  => $date
            ]));
            return response()->json(['message' => 'Artikel berhasil direlease','code' => 1, 'error' => false ]);
        }
    }
    
    public function delete(Request $request)
    {
        $id = $request->artikel_id;
        $artikel = Artikel::find($id);
        if($artikel){
            if($artikel->mode == 'DELETE'){
                return response()->json(['message' => 'Artikel sudah dihapus','code' => 0, 'error' => true ]);
            }else{
                $artikel->update([
                    'mode' => 'DELETE'
                ]);
                return response()->json(['message' => 'Artikel berhasil dihapus','code' => 1, 'error' => false ]);
            }
        }else{
            return response()->json(['message' => 'Artikel tidak ada','code' => 0, 'error' => true ]);
        }
    }

    public function myartikel(Request $request)
    {
        $artikel1 = Artikel::select('id', 'mode', 'sumber', 'image', 'judul', 'content')->where('mode', '!=', 'DELETE')->where('user_id', $request->user->id)->get();
        if($artikel1){
            foreach($artikel1 as $m){
                if($m->mode == 'DRAF'){
                    $artikel[] = [
                        'id' => $m->id,
                        'mode' => 'DRAFT',
                        'sumber' => $m->sumber,
                        'image' => $m->image,
                        'judul' => $m->judul,
                        'content' => $m->content,
                    ];
                }else{
                    $artikel[] = [
                        'id' => $m->id,
                        'mode' => $m->mode,
                        'sumber' => $m->sumber,
                        'image' => $m->image,
                        'judul' => $m->judul,
                        'content' => $m->content,
                    ];
                }
            }
        }
        return response()->json(['message' => 'Data my Artikel','code' => 1, 'error' => false, 'artikel' => $artikel??[]]);
    }
    
    public function like(Request $request)
    {
        $artikel_id = $request->artikel_id;
        $status = $request->status;
        $artikel = Artikel::find($artikel_id);
        if(!$artikel){
            return response()->json(['message' => 'Artikel tidak ada','code' => 1, 'error' => false ]);
        }
        $likes = Likes::where('user_id', $request->user->id)->where('artikel_id', $artikel_id)->first();
        if($status == 'LIKE'){
            if($likes){
                return response()->json(['message' => 'Sudah Like Artikel','code' => 1, 'error' => false ]);
            }else{
                Likes::create([
                    'user_id' => $request->user->id,
                    'artikel_id' => $artikel_id,
                ]);
                return response()->json(['message' => 'Like Berhasil','code' => 1, 'error' => false ]);
            }
        }elseif($status == 'UNLIKE'){
            if(!$likes){
                return response()->json(['message' => 'Sudah Unlike Artikel','code' => 1, 'error' => false ]);
            }
            $likes->delete();
            return response()->json(['message' => 'Unlike Berhasil','code' => 1, 'error' => false ]);
        }else{
            return response()->json(['message' => 'Parameter status Salah','code' => 2, 'error' => true ]);
        }
    }
    
    public function comment(Request $request)
    {
        $comment = $request->komentar;
        $artikel = Artikel::find($request->artikel_id);
        if(!$comment){
            return response()->json(['message' => 'Parameter komentar Tidak ada','code' => 2, 'error' => true ]);
        }
        if(!$artikel){
            return response()->json(['message' => 'Artikel Tidak ada','code' => 2, 'error' => true ]);
        }
        Komentars::create([
            'komentar'  => $comment,
            'artikel_id'=> $artikel->id,
            'user_id'   => $request->user->id
        ]);
        return response()->json(['message' => 'Komentar Berhasil','code' => 1, 'error' => false ]);
    }
    
    public function commentDelete(Request $request)
    {

        $comment = Komentars::where('user_id', $request->user->id)->where('id', $request->komentar_id)->first();
        if(!$comment){
            return response()->json(['message' => 'Komentar tidak ada','code' => 0, 'error' => true ]);
        }else{
            $comment->delete();
            return response()->json(['message' => 'Komentar berhasil dihapus','code' => 1, 'error' => false ]);
        }
    }
    
    public function create(Request $request)
    {
        if($request->mode == 'DRAF'){
            $required = Validate::required($request, ['judul', 'content', 'sumber']);
            if ($required) return $required;
            $date = '';
            if($request->image){
                $image = $request->file('image')->store('artikel');
            }else{
                $image = '';
            }
            Artikel::create(array_merge($request->all(), [
                'image'         => $image,
                'user_id'       => $request->user->id,
                'release_date'  => $date
            ]));
            return response()->json(['message' => 'Artikel berhasil disimpan','code' => 1, 'error' => false ]);
        }else{
            $required = Validate::required($request, ['judul', 'content', 'sumber', 'image']);
            if ($required) return $required;
            if(!in_array($request->mode, ['DRAF', 'RELEASE'])){
                return response()->json(['message' => 'Parameter mode salah','code' => 0, 'error' => true ]);
            }
            $image = $request->file('image')->store('artikel');
            $date = date('Y-m-d', time());
            Artikel::create(array_merge($request->all(), [
                'image'         => $image,
                'user_id'       => $request->user->id,
                'release_date'  => $date
            ]));
            return response()->json(['message' => 'Artikel berhasil direlease','code' => 1, 'error' => false ]);
        }
            
    }

    public function share($id, User $user)
    {
        $artikel = Artikel::find($id);
        return view('artikel.share', compact('artikel', 'user'));
    }

}
