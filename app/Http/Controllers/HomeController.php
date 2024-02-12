<?php

namespace App\Http\Controllers;

use App\Models\Home;
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
            'produk' => Home::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => "required",
            "gambar" => "required",
        ]);
        if ($request->file('gambar')) {
            $validate['gambar'] = $request->file('gambar')->store('gambar');
        }
        Home::create($validate);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        return view('edit', [
            'title' => "Edit",
            "produk" => $home
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'gambar' => 'required'
        ]);

        if ($request->file('gambar')) {
            if ($home->gambar) {
                Storage::delete($home->gambar);
            }
            $validate['gambar'] = $request->file('gambar')->store('gambar');
        }


        Home::where('id', $home->id)->update($validate);

        return redirect("/home");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        if ($home->gambar) {
            Storage::delete($home->gambar);
        }
        Home::destroy($home->id);
        return redirect('/home');
    }
}
