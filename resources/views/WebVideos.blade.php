@extends('welcome')
@section('content_videos')


<table border="1">
    @foreach($videos as $Get)
    <tr>
        <td>
            <a href={{ $Get->link_videos }} target="_blank">{{ $Get->judul_videos }}</a>
            <a href={{ $Get->link_videos }} target="_blank"><img src={{ $Get->gambar_videos }}></a><br>
        </td>
    </tr>
    @endforeach
</table>



@endsection
