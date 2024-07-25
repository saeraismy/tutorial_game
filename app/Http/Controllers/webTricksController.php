<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tricks;

class webTricksController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$tricks = DB::table('tricks')->get();

    	// mengirim data ke view
    	return view('WebTricks',['tricks' => $tricks]);
    }
    public function indexs()
    {
        $tricks = Tricks::orderBy('kd_tricks', 'desc')->get();
        $total = Tricks::count();
        return view('admin.tricks.home', compact(['tricks', 'total']));
    }
    public function create()
    {
        return view('admin.tricks.create');
    }
    public function save(Request $request)
    {
        $validation = $request->validate([
            'judul_tricks' => 'required',
            'gambar_tricks' => 'required',
            'link_tricks' => 'required',
        ]);
        $data = Tricks::create($validation);
        if ($data) {
            session()->flash('success', 'Tricks berhasil ditambahkan');
            return redirect(route('admin/tricks'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.tricks/create'));
        }
    }
    public function edit($kd_tricks)
    {
        $tricks = Tricks::findOrFail($kd_tricks);
        return view('admin.tricks.update', compact('tricks'));
    }
    public function update(Request $request, $kd_tricks)
    {
        $tricks = Tricks::findOrFail($kd_tricks);
        $judul_tricks = $request->judul_tricks;
        $gambar_tricks = $request->gambar_tricks;
        $link_tricks = $request->link_tricks;

        $tricks->judul_tricks = $judul_tricks;
        $tricks->gambar_tricks = $gambar_tricks;
        $tricks->link_tricks = $link_tricks;
        $data = $tricks->save();
        if ($data) {
            session()->flash('success', 'Tricks Update Successfully');
            return redirect(route('admin/tricks'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/tricks/update'));
        }
    }
    public function delete($kd_tricks)
    {
        $tricks = Tricks::findOrFail($kd_tricks)->delete();
        if ($tricks) {
            session()->flash('success', 'Tricks Deleted Successfully');
            return redirect(route('admin/tricks'));
        } else {
            session()->flash('error', 'Tricks Not Delete successfully');
            return redirect(route('admin/tricks'));
        }
    }
}
