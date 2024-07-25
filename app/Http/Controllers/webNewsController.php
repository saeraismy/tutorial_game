<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class webNewsController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$news = DB::table('news')->get();

    	// mengirim data ke view
    	return view('WebNews',['news' => $news]);

    }
    public function indexs()
    {
        $news = News::orderBy('kd_news', 'desc')->get();
        $total = News::count();
        return view('admin.news.home', compact(['news', 'total']));
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function save(Request $request)
    {
        $validation = $request->validate([
            'judul_news' => 'required',
            'gambar_news' => 'required',
            'link_news' => 'required',
        ]);
        $data = News::create($validation);
        if ($data) {
            session()->flash('success', 'News berhasil ditambahkan');
            return redirect(route('admin/news'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.news/create'));
        }
    }
    public function edit($kd_news)
    {
        $news = News::findOrFail($kd_news);
        return view('admin.news.update', compact('news'));
    }
    public function update(Request $request, $kd_news)
    {
        $news = News::findOrFail($kd_news);
        $judul_news = $request->judul_news;
        $gambar_news = $request->gambar_news;
        $link_news = $request->link_news;

        $news->judul_news = $judul_news;
        $news->gambar_news = $gambar_news;
        $news->link_news = $link_news;
        $data = $news->save();
        if ($data) {
            session()->flash('success', 'News Update Successfully');
            return redirect(route('admin/news'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/news/update'));
        }
    }
    public function delete($kd_news)
    {
        $news = News::findOrFail($kd_news)->delete();
        if ($news) {
            session()->flash('success', 'News Deleted Successfully');
            return redirect(route('admin/news'));
        } else {
            session()->flash('error', 'News Not Delete successfully');
            return redirect(route('admin/news'));
        }
    }
}
