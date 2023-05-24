<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|max:255',
        ]);
    
        $user = Auth::user();
        $feedback = new Feedback([
            'comment' => $validatedData['comment'],
        ]);
        $user->feedbacks()->save($feedback);
        return back()->with('success','Thank you for your feedback.');
    }
    
}
