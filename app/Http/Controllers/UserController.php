<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
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
     * Make login.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $request = request();
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('tokenAccess')->plainTextToken; 
   
            return response([
                "message" => 'Autenticação feita.', 
                'token' => $success['token']
            ]);
        } 
        else{ 
            return response('Erro de Authentication', 403);
        }
    }

    public function logout(Request $request)
    {        
        // $bearer_token = $request->bearerToken();
        // $token = PersonalAccessToken::findToken($bearer_token);
        // $token->delete();
        Auth::guard('web')->logout();
        return response(["Logout feito."]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($request->hasFile('photo')){
            $foto = $request->file('photo');
            $filename = uniqid() . "_" . $foto->getClientOriginalName();
            $foto->move(public_path('images'), $filename);
            $url = URL::to('/') . '/public/images/' . $filename;

            $user->photo = $url;
        }
        else $user->photo = '';
        
        if($user->save()){
            Auth::attempt(['email' => $request->email, 'password' => $request->password], true);
            $newUser = Auth::user(); 
            $success['token'] =  $newUser->createToken('tokenAccess')->plainTextToken; 
   
            return response(["message" => "Usuário criado.", "token" => $success['token']], 201);
        }
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
        //
    }
}
