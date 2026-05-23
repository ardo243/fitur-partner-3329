<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;


class PartnerController extends Controller
{
    public function index(Request $request)
    {
    $search = $request->search;
    $partners = Partner::where('name', 'LIKE', "%$search%")
                    ->paginate(5)
                    ->withQueryString();

    return view('admin.partners.index', compact('partners'))->with('search', $search);
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|url|max:500',
        ]);

        Partner::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    public function show(Partner $partner)
    {
        return redirect()->route('admin.partners.index');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|url|max:500',
        ]);

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus.');
    }
}