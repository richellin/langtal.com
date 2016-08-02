<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{
    
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('guest', ['except' => 'destroy']);
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*   
        $validator = \Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        if ($validator->fails()) {
            return $this->respondValidationError($validator);
        }
        */
        $token = is_api_request()
            ? \JWTAuth::attempt($request->only('email', 'password'))
            : Auth::attempt($request->only('email', 'password'), $request->has('remember'));
        if (! $token) {
            return $this->respondLoginFailed();
        }
        
        //event('users.login', [Auth::user()]);
        return $this->respondCreated($request->input('return'), $token);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::logout();
        flash(trans('auth.goodbye'));
        
        return redirect(route('index'));
    }
    
    /**
     * Make validation error response.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function respondValidationError(Validator $validator)
    {
        return back()->withInput()->withErrors($validator);
    }
    /**
     * Make login failed response.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function respondLoginFailed()
    {
        flash()->error(trans('auth.failed'));
        return back()->withInput();
    }
    /**
     * Make a success response.
     *
     * @param string $return
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function respondCreated($return = '', $token = '')
    {
        /*
        flash(trans('auth.welcome', ['name' => Auth::user()->name]));
        return ($return)
            ? redirect(urldecode($return))
          : redirect()->intended();
         */
         return response()->json([
            'code' => 201,
            'message' => 'success',
            // 인자로 넘겨 받은 token (JSON Web Token) 을 반환한다.
            // 클라이언트 사이드에서는 이 토큰을 저장하고 있다가 
            // Resource 요청시 Authorization Header 에 사용해야 한다.
            'token' => $token,
        ], 201);
    }
}
