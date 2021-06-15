<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidOrderException;
use Throwable;

use Illuminate\Http\Request;
use App\Models\User;
use App;

class UserController extends Controller
{
    //
    public function index()
    {
        try {

            $users = User::all();

            return $users;
        } catch (Throwable $e) {
            return response()->json([
                'status' => '500',
                'message' => $e
            ]);
        }
    }

    public function getClients()
    {
        try {

            $users = User::where('user_type', '=', 'CLIENT')->get();

            return $users;
        } catch (Throwable $e) {
            return response()->json([
                'status' => '500',
                'message' => $e
            ]);
        }
    }

    public function getEmployees()
    {
        try {

            $users = User::where('user_type', '=', 'EMPLOYEE')->get();

            return $users;
        } catch (Throwable $e) {
            return response()->json([
                'status' => '500',
                'message' => $e
            ]);
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            "name" => "required",
            "last_name" => "required",
            "cpf" => "required",
            "email" => "required",
            "password" => "required",
            "birth_date" => "required",
        ]);
        try {
            $newuser = User::create($request->all());
        } catch (Throwable $e) {
            return response()->json([
                'status' => '400',
                'message' => $e
            ]);
        }
        return response($newuser);
    }

    public function getById(Request $request, $id)
    {
        try {

            $user = User::where('id', $id)->get();

            if (count($user) == 0) {
                return response()->json([
                    'status' => '404',
                    'message' => 'User not Found'
                ]);
            }

            return response($user);
        } catch (Throwable $e) {
            return response()->json([
                'status' => '500',
                'message' => $e
            ]);
        }
    }

    public function getByEmail(Request $request)
    {
        $data = $request->all();

        try {

            $user = User::where('email', '=', $request->email)->get();

            if (count($user) == 0) {
                return response()->json([
                    'status' => '404',
                    'message' => 'User not Found'
                ]);
            }
            return  response($user);
        } catch (Throwable $e) {
            return response()->json([
                'status' => '500',
                'message' => $e
            ]);
        }
    }

    public function updateUserByEmail(Request $request)
    {

        $request->validate([
            "name" => "required",
            "last_name" => "required",
            "cpf" => "required",
            "email" => "required",
            "birth_date" => "required",
        ]);

        try {

            $user = User::where('email', $request->email)->first();

            $user->name = $request->name;
            $user->cpf = $request->cpf;
            $user->last_name = $request->last_name;
            $user->birth_date = $request->birth_date;

            $user->save();

            return response($user);
        } catch (Throwable $e) {
            return response()->json([
                'status' => '400',
                'message' => $e
            ]);
        }
    }

    public function updateUserPassword(Request $request)
    {
        $request->validate([
            "password" => "required",
            "email" => 'required'
        ]);
        try {

            $user = User::where('email', $request->email)->first();
            $user->password = $request->password;

            $user->save();
            return $user;
        } catch (Throwable $e) {
            return response()->json([
                'status' => '400',
                'message' => $e
            ]);
        }
    }
}
