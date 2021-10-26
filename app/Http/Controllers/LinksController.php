<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\link;
use Illuminate\Support\Str;

class LinksController extends Controller
{
    /**
     * Display a listing of the user links.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            $user_id = auth()->user()->id;
            $data = link::where('user_id',$user_id)->get();
        }
        // dd($user_id);
        return view('links.index',compact('data'));
    }
     /**
     * Store a new link.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('links.create');
    }

     /**
     * Store a new link.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'link' => 'required|url'
        ]);
        $user_id = auth()->user()->id;
        $link = new link();
        $link->url = $request->link;
        $link->short_url = url('/').'/'. Str::random(6);
        $link->user_id = $user_id;
        $link->save();
  
        return view('links.index');
    }

    
     /**
     * Store a new link.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       $link = link::find($id);
       $link->delete();
        return back();
    }
}

