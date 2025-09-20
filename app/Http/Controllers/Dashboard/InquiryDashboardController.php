<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;

class InquiryDashboardController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::orderBy('is_read')->orderByDesc('created_at')->paginate(3);
        return view('dashboard-pages.inquiries.list', compact('inquiries'));
    }

    public function markAsRead($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->is_read = true;
        $inquiry->save();
        return redirect()->route('dashboard.inquiries');
    }
}
