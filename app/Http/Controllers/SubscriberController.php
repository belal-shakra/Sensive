<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request){

        $validated_data = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);
        Subscriber::create($validated_data);

        return back()->with('stats', 'Subscribed Successfully.');
    }
}
