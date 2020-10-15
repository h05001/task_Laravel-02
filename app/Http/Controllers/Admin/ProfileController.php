<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function add()
 {
    return view('admin.profile.create');
 }
 public function create(Request $request)
   {

       // 以下をtask15で追記
       // Varidationを行う
       $this->validate($request, Profiles::$rules);

       $profile = new Profiles;
       $form = $request->all();

       // フォームから画像が送信されてきたら、保存して、$profile->image_path に画像のパスを保存する
       if (isset($form['image'])) {
         $path = $request->file('image')->store('public/image');
         $profile->image_path = basename($path);
       } else {
           $profile->image_path = null;
       }

       // フォームから送信されてきた_tokenを削除する
       unset($form['_token']);
       // フォームから送信されてきたimageを削除する
       unset($form['image']);

       // データベースに保存する
       $profile->fill($form);
       $profile->save();

 public function create()
 {
      return redirect('admin/profile/create');
 }

  public function edit()
  {
      return view('admin.profile.edit');
  }

  public function update()
  {
      return redirect('admin/profile/edit');
  }
}
