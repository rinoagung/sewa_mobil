<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            "produk_id" => "required",
            "hari" => "required|integer|min:1",
        ]);

        $pinjam = Carbon::now();
        $selesai = (int) $validate['hari'];

        $validate['user_id'] = auth()->user()->id;
        $validate['pinjam'] = $pinjam;
        $validate['selesai'] = $pinjam->copy()->addDays($selesai);
        Pinjam::create($validate);

        $updateSewa['sewa'] = 1;
        Products::where('id', $validate['produk_id'])
            ->update($updateSewa);
        return redirect('/home/katalog');
    }

    public function riwayat()
    {
        $userId = auth()->user()->id;
        return view('riwayat', [
            'title' => 'Tambah',
            'produk' => Products::join('pinjam', 'produk.id', '=', 'pinjam.produk_id')
                ->where('produk.user_id', $userId)
                ->get()
        ]);
    }

    public function selesai(Request $request)
    {
        $validate = $request->validate([
            "id_produk" => "required",
        ]);
        $updateSewa['sewa'] = 2;
        Products::where('id', $validate['id_produk'])
            ->update($updateSewa);
        return redirect('/home/create');
    }
}
