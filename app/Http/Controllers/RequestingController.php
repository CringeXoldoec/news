<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requesting;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class RequestingController extends Controller
{
    public function index(){
        return view('ofer');
    }

    public function indexShow(){
        return view(view: 'shows');
    }

    public function show(){ 
        $requests = Requesting::where('user_id', auth()->id())->get();
        return view('shows', compact('requests'));
    }

    public function store(Request $request){
        $validated =  $request->validate([
            'cource' => 'required|string|max:255',
            'date' => 'required|string',
            'payment_metod' => ['required', Rule::in('card', 'cash')],
        ]);

        $model = new Requesting();
        $model->cource = $request->cource;
        $model->date = $request->date;
        $model->payment_metod = $request->payment_metod;
        $model->user_id = Auth::id();
        $model->save();

        session() -> flash("success", "Ваша заявка была добавлена");
        $hasOrnot = Requesting::where('user_id', Auth::id())->exists();
        return redirect()->back();
    }
}
