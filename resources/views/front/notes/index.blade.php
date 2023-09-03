@extends("front.layouts.master")
@section("content")

    <a class="btn btn-success" href="{{route("notes_createPage")}}">Not oluştur </a>
<br><br>

        @if(session("success"))
            <div class="alert alert-success">
            {{session("success")}}
            </div>
        @endif


    bu sayfada notlar listelenecek
@endsection
