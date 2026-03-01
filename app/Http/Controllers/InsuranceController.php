<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;
use App\Http\Requests\InsuranceRequest;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::all();
        return view('insurance.index', compact('insurances'));
    }

    public function store(InsuranceRequest $request)
    {
        $restored = Insurance::restoreIfExists('name', $request->name);

        if ($restored) {
            return redirect()->route('insurance.index')
                ->with('success', 'Jenis asuransi berhasil dipulihkan.');
        }

        Insurance::create($request->validated());

        return redirect()->route('insurance.index')
            ->with('success', 'Jenis asuransi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);

        $insurance = Insurance::findOrFail($id);

        $exists = Insurance::whereInsensitive('name', $data['name'])
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Jenis asuransi sudah ada.');
        }

        $insurance->update(['name' => $data['name']]);

        return redirect()->route('insurance.index')->with('success', 'Jenis asuransi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $insurance = Insurance::findOrFail($id);
        $insurance->delete();

        return redirect()->route('insurance.index')->with('success', 'Jenis asuransi berhasil dihapus.');
    }
}
