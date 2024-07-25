<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Videos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List Videos</h1>
                        <a href="{{ route('admin/videos/create') }}" class="btn btn-primary btn-sage">Add Video</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Judul Video</th>
                                <th>Gambar Video</th>
                                <th>Link Video</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($videos as $video)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $video->judul_videos }}</td>
                                <td class="align-middle">
                                    <img src="{{ $video->gambar_videos }}" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td class="align-middle">
                                    <a href="{{ $video->link_videos }}" target="_blank">{{ $video->link_videos }}</a>
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/videos/edit', ['kd_videos'=>$video->kd_videos]) }}" type="button" class="btn btn-outline-secondary">Edit</a>
                                        <a href="{{ route('admin/videos/delete', ['kd_videos'=>$video->kd_videos]) }}" type="button" class="btn btn-outline-dark">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Videos not found</td>
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
