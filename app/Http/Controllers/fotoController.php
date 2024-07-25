<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class fotoController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$bio = DB::table('bio')->get();

    	// mengirim data ke view
    	return view('bio',['bio' => $bio]);

    }
}
