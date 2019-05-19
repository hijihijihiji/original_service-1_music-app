<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvicesFavoritesController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->advices_favorite($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->advices_unfavorite($id);
        return back();
    }
}
