<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthenticationController extends Controller
{
    //
    public function register(Request $request){

        //VALIDATE INPUT
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors()->all()],500);
        }
        //HASHING PASSWORD
        $password_hash = Hash::make($request->password);

        //INSERT TO DATABASE
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password_hash
        ]);

        //TOKEN
        $token = $user->createToken('KodegoTokenPassword')->accessToken;

        $response = ['message' => 'User successfully created!','token'=> $token];

        return $response;
    }

    public function login(Request $request){
        //VALIDATE INPUT
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors()->all()],500);
        }

        //select * from user where email = $request->email
        $user = User::where('email',$request->email)->first();

        //if exist
        if($user){
            //check if same password using hash
            $check_password = Hash::check($request->password, $user->password);

            //if same password
            if($check_password){
                $token = $user->createToken('KodegoTokenPassword')->accessToken;
                $response = ['message' => 'User successfully logged in!','token'=> $token];

                return $response;
            }else{
                return response(['message'=> 'Invalid password!'],500);
            }

        }else{
            return response(['message'=> 'Username does not exist!'],500);
        }
    }

    public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'User successfully logged out!'];

        return $response;
    }
}