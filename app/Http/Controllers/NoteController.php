<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mockery\Matcher\Not;

class NoteController extends Controller
{

    public function index(){
        // $var = Note::get();
        // $var = Note::where("vertabanındakiSütun (haystack)","aramakİstediğimDeğer(needle)"); hepsini getirir
        // $var=Note::where("title","a")->get();
        // $var=Note::where("id","<","5)->get();
        // dd($var);

        //   $user=User::where("id",2)->first();
        //  $not=Note::where("title","ABCDE")->first();
        //  $notlar=Auth::user()->getNotes;

         // $notlar=Note::where("user_id",Auth::user()->id)->latest("updated_at")->get();

         $notlar=Note::where("user_id",Auth::user()->id)->latest("updated_at")->paginate(2);

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
                "content"=>"required | min:12",
            ],[
                //custom message
                //keyAdı.kuralAdı=>"mesaj",
                "title.required"=>"başlık yazmayı unutma",
                "title.min"=>"lütfen daha uzun yaz",
                "content.min"=>"İçerik 12 karakter olmalıdır ",
            ]
        );

        //laravel otomotik olarak errors gönderir
        //eğer validate kısmında hata varsa
        //        return redirect()->back()->with("errors,"message ");


        $note= new Note();
        $note->user_id =Auth::user()->id;
        $note->title = $request->title;
        $note->content =$request->content;
        $note->uui_d =Str::uuid();
        $note->save();
      //  return redirect()->back();

        return redirect()->route("notes_index")->with("success","Başarı ile kaydedildi");

        //laravel9 return to_route("notes_index)

    }

    public function detail1($notUUID){
     $not=Note::where("uui_d",$notUUID)->first();


   //  $not =Note::find($notID);
     if($not->user_id =! Auth::user()->id){
         abort(403);
        }
     return view("front.notes.detail1",compact("not"));

    }

    public function update($noteID){
        $not=Note::find($noteID);
        return view("front.notes.update1",compact("not"));
    }

    public function edit(Request $request,$notID){
        $request->validate([
           "title"=>"required",
           "content"=>"min:10"
        ]);
        $not=Note::find($notID);
        $not->title = $request->title;
        $not->content = $request->content;
        $not->save();
        return redirect()->route("notes_index")->with("message","güncelleme başarılı");
    }

}
