<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Advice;

class AdvicesController extends Controller
{
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'advice_url' => 'required|max:768',
            'content' => 'required|max:191',
        ]);
        
        $request->user()->advices()->create([
            'advice_url' => $request->advice_url,
            'content' => $request->content,
            'post_id' => $id,
        ]);
        
        return redirect()->route('posts.show', $id);
    }
    
    public function destroy($postId, $adviceID)
    {
        $advice = Advice::find($adviceID);

        if (\Auth::id() === $advice->user_id) {
            $advice->delete();
            
        }
        return back();
        
    }
    
    public function create($id)
    {
        $advice = new Advice;
        $advice->post_id = $id;
        
        return view('advices.create', [
            'advice' => $advice,
        ]);
    }

}
