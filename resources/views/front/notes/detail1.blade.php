@extends("front.layouts.master")
@section("content")

    <div class="d-flex justify-content-between">

        <h1>burası detay bir sayfası</h1>
        <button class="btn btn-danger ">"&nbsp;Güncelle"&nbsp;</button>

    </div>
    <br><br>

    <div class="bg-white p-3 rounded-3">
        <h2>{{$not->title}}</h2><br>
        <p>{{$not->content}}</p>

        <span class="text-muted"> {{$not->updated_at->diffForHumans()}}</span>

    </div>

@endsection
