@extends("front.layouts.master")
@section("content")

    <button class="btn btn-success" href="{{route("notes_createPage")}}">Not oluştur </button>
<br><br>

        @if(session("success"))
            <div class="alert alert-success">
            {{session("success")}}
            </div>
        @endif


    bu sayfada notlar listelenecek
@endsection
