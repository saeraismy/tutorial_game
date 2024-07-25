@extends('welcome')
@section('content_news')


<table border="1">
    @foreach($news as $Get)
    <tr>
        <td>
            <a href={{ $Get->link_news }} target="_blank">{{ $Get->judul_news }}</a>
            <a href={{ $Get->link_news }} target="_blank"><img src={{ $Get->gambar_news }}></a><br>
        </td>
    </tr>
    @endforeach
</table>



@endsection
