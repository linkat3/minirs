<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
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
        return view('dashboard', compact('links'));
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
    public function store(Request $request): RedirectResponse
    {
        $data =  $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|unique:community_links|url|max:255',
        ]);

        $link = new CommunityLink($data);
        //Si uso CommunityLink::create($data) tengo que declara user_id y channel_id como $fillable
        $link->user_id = Auth::id();
        $link->channel_id = 1;
        $link->save();
       return back();
        // return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
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
}
