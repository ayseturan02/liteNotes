<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{

    public function index(){
       // $var = Note::get();
       // $var = Note::where("vertabanındakiSütun (haystack)","aramakİstediğimDeğer(needle)"); hepsini getirir
       // $var=Note::where("title","a")->get();
       // $var=Note::where("id","<","5)->get();
        // dd($var);

        $notlar=Note::get();
        return view("front.notes.index",compact("notlar"));
    }

    public function createPage(){
        return view("front.notes.create");
    }

    public function addNote(Request $request){
        //request
        //dd die and dump dd("elif")
        //dd($request->all());
        //dd($request["not_baslık"]);
        // dd($request->not_baslık);
        //Auth::user();
        //dd(Auth::user()->id);
        //validation doğrulama kuralkoyma

        $request->validate(
            [
                //"doğrulamakistediğimizkey"="Kuralkoyma"
                //"title"=>"zorunlu"
                "title" => "required | min:3 | max:30",
                "content"=>"required",
            ],[
                //custom message
                //keyAdı.kuralAdı=>"mesaj",
                "title.required"=>"başlık yazmayı unutma",
                "title.min"=>"lütfen daha uzun yaz",
            ]
        );

        //laravel otomotik olarak errors gönderir
        //eğer validate kısmında hata varsa
        //        return redirect()->back()->with("errors,"message ");


        $note= new Note();
        $note->user_id =Auth::user()->id;
        $note->title = $request->title;
        $note->content =$request->content;
        $note->save();
      //  return redirect()->back();

        return redirect()->route("notes_index")->with("success","Başarı ile kaydedildi");
    }
}
