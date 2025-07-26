<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function create($recruitmentId)
    {
        $recruitment = Recruitment::findOrFail($recruitmentId);
        return view('application.create', compact('recruitment'));
    }

    public function store(Request $request, $recruitmentId)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:1000',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = null;
        if ($request->hasFile('cv_file')) {
            $cvPath = $request->file('cv_file')->store('cv_files', 'public');
        }

        Application::create([
            'user_id'        => auth()->id(),
            'recruitment_id' => $recruitmentId,
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'message'        => $request->message,
            'cv_file'        => $cvPath,
        ]);

        return redirect()->route('recruitment')->with('success', 'Ứng tuyển thành công!');
    }

}
