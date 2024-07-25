@extends('welcome')
@section('content_tricks')


<table border="1">
    @foreach($tricks as $Get)
    <tr>
        <td>
            <a href={{ $Get->link_tricks }} target="_blank">{{ $Get->judul_tricks }}</a>
            <a href={{ $Get->link_tricks }} target="_blank"><img src={{ $Get->gambar_tricks }}></a><br>
        </td>
    </tr>
    @endforeach
</table>



@endsection
