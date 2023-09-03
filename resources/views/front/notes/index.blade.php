@extends("front.layouts.master")
@section("content")

    <a class="btn btn-success" href="{{route("notes_createPage")}}">Not oluştur </a>
<br><br>

        @if(session("success"))
            <div class="alert alert-success">
            {{session("success")}}
            </div>
        @endif

@if($notlar->count() > 0)
@foreach($notlar as $not)
    <div class="card mt-3">
        <div class="card-header">
            {{$not->title}}
        </div>
        <div class="card-body">
            {{$not->content}}
        </div>
    </div>
@endforeach

@else
    Henüz bir not kaydetmediniz !.
@endif

@endsection
