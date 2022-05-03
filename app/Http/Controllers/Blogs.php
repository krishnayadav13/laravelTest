<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
class blogs extends Controller
{
   public function index(Request $req){
    $mytime=Carbon::now();
    
      if(Auth()->check()){
       $user= User::where('id',Auth()->id())->first();
          if($user->role=='user'){
        $blog=Blog::where('is_active',1)->where('end_date','>=',explode(' ',$mytime->toDateTimeString())[0])->where('user_id',Auth()->id())->get();
        return view('getblog',compact('blog'));
          }  
        }
    
      $blog=Blog::where('is_active',1)->where('end_date','>=',explode(' ',$mytime->toDateTimeString())[0])->get();

    return view('getblog',compact('blog'));
   
   }   

   public function store(Request $req){
    $req->validate([
        'Title' => ['required', 'string', 'max:255'],
        'Description' => ['required', 'string', 'max:255'],
        'StartDate' => ['required', 'string'],
        'EndDate' => ['required', 'string'],
        'Is_Active' =>['required', 'string']
    ]);

    
    Blog::create([
        'title' => $req['Title'],
        'description' => $req['Description'],
        'is_active'=> $req['Is_Active'],
        'start_date'=> $req['StartDate'],
        'end_date' => $req['EndDate'],
        'user_id'=>Auth()->id()
    ]);
  
    return redirect('/');
       }

       public function updateform($id){
        $blog=Blog::where('id',$id)->first();

        return view('updateformblog',compact('blog'));
       }

       public function update(Request $req){
        Blog::where('id',$req->id)->update(['title' => $req['Title'],
        'description' => $req['Description'],
        'start_date'=> $req['StartDate'],
        'end_date' => $req['EndDate'],
        'is_active'=>$req['IsActive'],
    ]);
        return redirect('/');
       }

       public function destroy(Request $req){
       
        Blog::where('id',$req->id)->delete();
      
        return redirect('/');
       }
    
    
}
