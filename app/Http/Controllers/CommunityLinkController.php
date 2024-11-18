<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommunityLinkForm;
use App\Models\Channel;
use App\Models\CommunityLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;



use Illuminate\Http\RedirectResponse;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = CommunityLink::paginate(25);
        $term = request()->get('search');
        $channels = Channel::orderBy('title', 'asc')->get();

        if ($term) {
        
        $links = CommunityLink::whereAny(['title', 'link'], 'like', "%$term%")->paginate(10);
        
        }  else {
        $links = CommunityLink::where('approved', 1)->paginate(25);
        
        }

        return view('dashboard', compact('links', 'channels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityLinkForm $request)
    {

        $data =  $request->validated();

        $link = new CommunityLink($data);

        //Si uso CommunityLink::create($data) tengo que declara user_id y channel_id como $fillable
        $link->user_id = Auth::id();
        $link->approved = Auth::user()->trusted ?? false;
        $link->save();
        if (Auth::user()->trusted) {
            return redirect('/dashboard')->with('linkSend', 'Link añadido');
        } else {
            return redirect('/dashboard')->with('warning', 'Link pendiente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
        //$communityLink->user_id = Auth::id();
        //$communityLink->approved = Auth::user()->trusted ?? false;
       // $communityLink->save();
        // $communityLink = communityLink::latest()->paginate(10);        
        // return view('/dashboard', compact('links'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }


    public function mostrarFecha()
    {
        $fechaActual = date('Y-m-d');
        $datos = [
            'dia' => date('d', strtotime($fechaActual)),
            'mes' => date('m', strtotime($fechaActual)),
            'año' => date('Y', strtotime($fechaActual)),
        ];
        return view('fecha')->with('datos', $datos);
    }

    //usando with() para la vista de home
    public function home()
    {
        $mensaje = 'Probando blade en laravel';

        return view('home')->with(['mensaje' => $mensaje]);
    }

    public function myLinks()
    {
        $u = Auth::user();
        $links = $u->CommunityLink()->paginate(10);
        return view('mylinks', compact('links'));
    }
}
