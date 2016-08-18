<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User as User;

use \Auth as Auth;

use Intervention\Image\ImageManagerStatic as Image;
use File;

class UsersController extends Controller
{
    private $user_id;
    private $items;
    
    public function __construct()
    {
        parent::__construct();
        $this->user_id = Auth::user()->id;
        $this->items['nations'] = getNations();
        $this->items['langs'] = getLangs();
    }
    
    public function show($id)
    {
        $user = User::find($id);
        if($user === null) {
            return redirect()->to("/");
        }
        
        return view('users.show')->with([
            'user' => $user,
            'items' => $this->items,
        ]);
    }
    public function edit(Request $request, $id)
    {
        if($this->user_id !== (int)$id) {
            return redirect()->to("/");
        }
        $user = User::find($id);
        
        return view('users.edit')->with([
            'user' => $user,
            'items' => $this->items,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        if($this->user_id !== (int)$id) {
            return redirect()->to("/");
        }
        
        $user = User::find($id);
           
        //評価対象
        $inputs = $request->all();
        
        //ルール
        $rules = [
            'name'=>'required',
            //'email'=>'required|email|unique:users',
            'email'=>'required|email',
            'nation'=>'required',
            'explain'=>'required|max:1000',
        ];
        
        $messages = [
            'name.required'=>'名前は必須です。',
            'email.required'=>'emailは必須です。',
            'email.email'=>'emailの形式で入力して下さい。',
            //'email.unique'=>'このemailは既に登録されています。',
            'nation.required'=>'名前は必須です。',
            'explain.required'=>'名前は必須です。',
            'explain.max'=>'1,000まで入力して下さい。',
        ];
        
        for ($i=1; $i <= 3; $i++) { 
            $img = "img{$i}";
            if($user->$img === '') {
                $rules[$img] = 'required';
                $messages[$img.'.required'] = 'イメージは必須です。';
            }
        }
        
        $validation = \Validator::make($inputs,$rules,$messages);
        
        //エラー次の処理
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }
        
        $imgs = [];
        for ($i=1; $i <= 3; $i++) { 
            $img = "img{$i}";
            if($request->file($img) !== null && $request->file($img)->isValid()) {
                $imgs[$img] = $request->file($img);
            }
        }
        
        $img_extention = 'jpg';
        $img_size = [
            'b' => ['w'=>640,'h'=>480],
            'm' => ['w'=>533,'h'=>400],
            //'s' => ['w'=>300,'h'=>200],
            //'t' => ['w'=>100,'h'=>75],
        ];
        
        $dir = public_path() . '/img/' . $id . '/';
        if (! File::isDirectory($dir)) {
            File::makeDirectory($dir, 0775, true);
        }
        
        foreach ($imgs as $img_name => $img_obj) {
            foreach ($img_size as $img_type => $sizes) {
                $image = Image::make($img_obj->getRealPath())->resize($sizes['w'], $sizes['h']);
                $image->save(public_path() . '/img/' . $id . '/'.$img_type.'_'.$img_name.'.'.$img_extention);
            }
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nation = $request->nation;
        $user->explain = $request->explain;
        
        foreach ($imgs as $img_name => $img_obj) {
            $img_update = "{$img_name}_updated_at";
            $user->$img_name = $img_name.'.'.$img_extention;
            $user->$img_update = (new \DateTime)->format('Y-m-d H:i:s');
        }
        
        $user->save();
        //一覧画面へリダイレクト
        \Session::flash('flash_message', 'successfully!');
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
