<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Pinjam;
use App\Models\Products;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\VarDumper;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home', [
            'title' => 'Home',
            'h1' => "Halaman Awal",
            'user' => User::where("id", auth()->user()->id)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', [
            'title' => 'Tambah',
            'produk' => Products::where("user_id", auth()->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'merk' => "required",
            "model" => "required",
            "plat_nomor" => "required",
            "tarif_sewa" => "required",
        ]);

        $validate['user_id'] = auth()->user()->id;
        $validate['sewa'] = 0;
        Products::create($validate);
        return redirect('/home/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }
    /**
     * Display Katalog.
     */
    public function katalog()
    {
        return view('katalog', [
            'title' => 'Katalog',
            'h1' => "Halaman Katalog",
            'produk' => Products::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validate = $request->validate([
            'id_produk' => "required",
        ]);
        Products::destroy($validate['id_produk']);
        Pinjam::where('produk_id', $validate['id_produk'])->delete();
        return redirect('/home/create');
    }
}
