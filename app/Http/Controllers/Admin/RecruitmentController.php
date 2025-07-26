<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruitment;

class RecruitmentController extends Controller
{
    public function index()
    {
        $recruitments = Recruitment::withCount('applications')->latest()->paginate(10);

        return view('admin.recruitments.index', compact('recruitments'));
    }

    public function create()
    {
        return view('admin.recruitments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'position' => 'nullable|string',
            'salary' => 'nullable|integer',
            'deadline' => 'nullable|date',
        ]);

        Recruitment::create($request->all());

        return redirect()->route('admin.recruitments.index')->with('success', 'Đăng tuyển thành công!');
    }

    public function edit($id)
    {
        $recruitment = Recruitment::findOrFail($id);
        return view('admin.recruitments.edit', compact('recruitment'));
    }

    public function update(Request $request, $id)
    {
        $recruitment = Recruitment::findOrFail($id);

        $recruitment->update($request->all());

        return redirect()->route('admin.recruitments.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        Recruitment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }

    public function applications($id)
    {
        $recruitment = \App\Models\Recruitment::with('applications')->findOrFail($id);
        return view('admin.recruitments.applications', compact('recruitment'));
    }

    public function toggleContacted(\App\Models\Application $application)
    {
        $application->contacted = !$application->contacted;
        $application->save();

        return back()->with('success', 'Cập nhật trạng thái liên hệ thành công!');
    }


}
