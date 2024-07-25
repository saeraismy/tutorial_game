<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tricks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Tricks</h1>
                    <hr />
                    <form action="{{ route('admin/tricks/update', $tricks->kd_tricks) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Judul Tricks</label>
                                <input type="text" name="judul_tricks" class="form-control" placeholder="Judul Tricks" value="{{$tricks->judul_tricks}}">
                                @error('judul_tricks')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Gambar Tricks</label>
                                <input type="text" name="gambar_tricks" class="form-control" placeholder="Gambar Tricks" value="{{$tricks->gambar_tricks}}">
                                @error('gambar_tricks')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Link Tricks</label>
                                <input type="text" name="link_tricks" class="form-control" placeholder="Link Tricks" value="{{$tricks->link_tricks}}">
                                @error('link_tricks')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-secondary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
