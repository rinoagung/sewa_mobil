<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register.index", [
            "title" => "Register",
            "active" => "register"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:255",
            "alamat" => "required|max:255",
            "username" => "required|min:2|max:255|unique:users",
            "no_telp" => "required|min:2|max:255|unique:users",
            "no_sim" => "required|min:2|max:255|unique:users",
            "password" => "required|min:4|max:255"
        ]);

        $validatedData["password"] = bcrypt($validatedData["password"]);
        // $validatedData["password"] = Hash::make($validatedData["password"]);


        User::create($validatedData);
        // $request->session()->flash("success", "Congratulations! you have successfully created an account");

        return redirect("/")->with("success", "Congratulations! you have successfully created an account");
    }
}
