<?php

namespace App\Http\Controllers;
 
use App\Models\testimonial;
use Illuminate\Http\Request;

class testmonialcontroller extends Controller
{
    public function index()
    {
        $testimonials = testimonial::latest()->get();
        return view('testimonial.testimonial', compact('testimonials'));
    }
    public function store(Request $request)
{
    $data = $request->validate([
        'comment' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    if (auth()->check()) {
        // مستخدم مسجل دخول
        $user = auth()->user();
        $data['client_name'] = $user->name;
        $data['profession'] = $user->profession ?? 'زبون';
        $data['image'] = $user->image ?? null;
    } else {
        // زائر
        $data['client_name'] = 'ضيف';
        $data['profession'] = 'زائر';
        $data['image'] = null;
    }

    Testimonial::create($data);

    return redirect()->route('testimonial.index')->with('success', 'تم إرسال تعليقك بنجاح');
}
}
