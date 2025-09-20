<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testimonialcontroller extends Controller
{
    public function index()
    {
        $testimonials = \App\Models\Testimonial::all();
        return view('dashboard-pages.testimonials.list', compact('testimonials'));
    }
    public function delete(Request $request, $id)
    {
        $testimonial = \App\Models\Testimonial::find($id);

        if (!$testimonial) {
            abort(404);
        }

        $testimonial->delete();

        return redirect()->route('testimonials.list');

        // Here we will write our database logic
    }
}
