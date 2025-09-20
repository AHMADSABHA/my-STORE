<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
     $data=   $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
           'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);
        // Inquiry::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'message' => $request->message,
        //     'image' => $request->file('image') ? $request->file('image')->store('inquiries', 'public') : null,
        // ]);
    //      if ($request->hasFile('image')) {
    //     $data['image'] = $request->file('image')->store('inquiries', 'public');
    // } else {
    //     $data['image'] = null;
    // }

    // Inquiry::create($data);
     
        $data = $request->only(['name', 'email', 'message']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
            $data['image'] =  $path;
        }
        Inquiry::create($data);
        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح!');
    }
}
