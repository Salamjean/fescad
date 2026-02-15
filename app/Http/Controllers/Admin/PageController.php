<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($page->image) {
                Storage::disk('public')->delete($page->image);
            }
            $imagePath = $request->file('image')->store('pages', 'public');
            $data['image'] = $imagePath;
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page mise à jour avec succès.');
    }
}
