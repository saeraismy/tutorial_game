<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Videos;

class webVideosController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$videos = DB::table('videos')->get();

    	// mengirim data ke view
    	return view('WebVideos',['videos' => $videos]);

    }

    public function indexs()
    {
        $videos = Videos::orderBy('kd_videos', 'desc')->get();
        $total = Videos::count();
        return view('admin.videos.home', compact(['videos', 'total']));
    }
    public function create()
    {
        return view('admin.videos.create');
    }
    public function save(Request $request)
    {
        $validation = $request->validate([
            'judul_videos' => 'required',
            'gambar_videos' => 'required',
            'link_videos' => 'required',
        ]);
        $data = Videos::create($validation);
        if ($data) {
            session()->flash('success', 'Video berhasil ditambahkan');
            return redirect(route('admin/videos'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.videos/create'));
        }
    }
    public function edit($kd_videos)
    {
        $videos = Videos::findOrFail($kd_videos);
        return view('admin.videos.update', compact('videos'));
    }
    public function update(Request $request, $kd_videos)
    {
        $videos = Videos::findOrFail($kd_videos);
        $judul_videos = $request->judul_videos;
        $gambar_videos = $request->gambar_videos;
        $link_videos = $request->link_videos;

        $videos->judul_videos = $judul_videos;
        $videos->gambar_videos = $gambar_videos;
        $videos->link_videos = $link_videos;
        $data = $videos->save();
        if ($data) {
            session()->flash('success', 'Videos Update Successfully');
            return redirect(route('admin/videos'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/videos/update'));
        }
    }
    public function delete($kd_videos)
    {
        $videos = Videos::findOrFail($kd_videos)->delete();
        if ($videos) {
            session()->flash('success', 'Videos Deleted Successfully');
            return redirect(route('admin/videos'));
        } else {
            session()->flash('error', 'Videos Not Delete successfully');
            return redirect(route('admin/videos'));
        }
    }
}
