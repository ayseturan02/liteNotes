@extends("front.layouts.master")
@section("content")

    <div class="d-flex justify-content-between">

        <h1>burası detay bir sayfası</h1>
        <a href="{{route("notes_update",$note->id)}}" class="btn btn-danger">&nbsp;Güncelle&nbsp;</a>

    </div>
    <br><br>

    <div class="bg-white p-3 rounded-3">
        <h2>{{$note->title}}</h2><br>
        <p>{{$note->content}}</p>

        <span class="text-muted"> {{$note->updated_at->diffForHumans()}}</span>

    </div>

@endsection
