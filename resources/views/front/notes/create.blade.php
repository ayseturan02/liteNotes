@extends("front.layouts.master")
@section("content")


    @if($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
         <li>{{$error}}</li>
        @endforeach
        </ul>
        </div>
    @endif


    <form method="POST" action="{{route("notes_addNote")}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Başlık</label>
            <input type="text" name="title" placeholder="lütfen not başlığını giriniz" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">İçerik</label>
            <textarea class="form-control" name="content" placeholder="İçerik" id="floatingTextarea2" style="height: 100px"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Gönder</button>
    </form>


@endsection

