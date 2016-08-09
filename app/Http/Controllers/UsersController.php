<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User as User;
class UsersController extends Controller
{
    private $user_id;
    
    public function __construct()
    {
        parent::__construct();
        $this->user_id = session()->get('user_id', 0);;
    }
    
    public function show($id)
    {
        $user = User::find($id);
        if($user === null) {
            return redirect()->to("/");
        }
        return view('users.show')->with(compact('user'));
    }
    public function edit(Request $request, $id)
    {
        if($this->user_id !== (int)$id) {
            return redirect()->to("/");
        }
        $user = User::find($id);
        return view('users.edit')->with(compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        if($this->user_id !== (int)$id) {
            return redirect()->to("/");
        }
        
        //評価対象
        $inputs = $request->all();

        //ルール
        $rules = [
            'name'=>'required',
            //'email'=>'required|email|unique:users',
            'email'=>'required|email',
        ];

        $messages = [
            'name.required'=>'名前は必須です。',
            'email.required'=>'emailは必須です。',
            'email.email'=>'emailの形式で入力して下さい。',
            'email.unique'=>'このemailは既に登録されています。',
        ];

        $validation = \Validator::make($inputs,$rules,$messages);
        
        //エラー次の処理
        if($validation->fails())
        {
            dd($validation->errors());
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        
        $user->save();
        return redirect()->to("/users/show/{$id}");
    }
    
    public function destroy($id)
    {
        if($this->user_id !== (int)$id) {
            return redirect()->to("/");
        }
        
        $user = User::find($id);
        //削除
        $user->delete();
        //リダイレクト
        return redirect()->to('/');
    }
}
