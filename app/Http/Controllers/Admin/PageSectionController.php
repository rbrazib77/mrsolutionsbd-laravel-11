<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSectionTitle;

class PageSectionController extends Controller
{
    // Show all pages
    public function index()
    {
        $pages = PageSectionTitle::orderBy('page_name')->orderBy('section_name')->get()
        ->groupBy('page_name'); // page_name অনুযায়ী group করে দিবে
        return view('admin.pageSection.index', compact('pages'));
    }

    // Show create form
    public function create()
    {
        return view('admin.pageSection.create');
    }

    // Store new page + sections
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string|max:255',
            'sections'  => 'required|array',
            'sections.*.name'  => 'required|string|max:255',
            'sections.*.title' => 'required|string|max:255',
        ]);

        foreach ($request->sections as $section) {
            PageSectionTitle::updateOrCreate(
                ['page_name' => $request->page_name, 'section_name' => $section['name']],
                ['title' => $section['title']]
            );
        }

        return redirect()->route('admin.pages.index')->with('success', 'Page & sections added successfully.');
    }

    // Show edit form
    public function edit($pageName)
    {
        $sections = PageSectionTitle::where('page_name', $pageName)->get();
        return view('admin.pages.edit', compact('sections', 'pageName'));
    }

    // Update sections
    public function update(Request $request, $pageName)
    {
        $request->validate([
            'sections'  => 'required|array',
            'sections.*.id'    => 'required|integer|exists:page_sections,id',
            'sections.*.title' => 'required|string|max:255',
        ]);

        foreach ($request->sections as $section) {
            PageSectionTitle::find($section['id'])->update([
                'title' => $section['title']
            ]);
        }

        return redirect()->route('admin.pages.index')->with('success', 'Sections updated successfully.');
    }
}

