<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List News</h1>
                        <a href="{{ route('admin/news/create') }}" class="btn btn-primary btn-sage">Add News</a>
                    </div>
                    <hr />
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Judul News</th>
                                <th>Gambar News</th>
                                <th>Link News</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($news as $news)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $news->judul_news }}</td>
                                    <td class="align-middle">
                                        <img src="{{ $news->gambar_news }}"
                                            style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <td class="align-middle">
                                        <a href={{ $news->link_news }} target="_blank">{{ $news->link_news }}</a>
                                    </td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin/news/edit', ['kd_news' => $news->kd_news]) }}"
                                                type="button" class="btn btn-outline-secondary">Edit</a>
                                            <a href="{{ route('admin/news/delete', ['kd_news' => $news->kd_news]) }}"
                                                type="button" class="btn btn-outline-dark">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">News not found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .btn-sage {
        background-color: #90be97;
        border-color: #78a48d;
        color: #fff;
    }

    .btn-sage:hover {
        background-color: #789d7e;
        border-color: #78a48d;
        color: #fff;
    }
</style>
