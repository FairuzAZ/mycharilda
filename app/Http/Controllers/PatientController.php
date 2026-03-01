<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagePatient\StoreNewPatient;
use App\Http\Requests\ManagePatient\UpdatePatient;
use App\Models\Patient;
use App\Services\MrnGenerator;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patient.index', compact('patients'));
    }

    public function create()
    {
        return view('patient.add');
    }

    public function store(StoreNewPatient $request)
    {
        $patient = new Patient();
        $patient->fill($request->validated());

        $patient->medical_record_number = MrnGenerator::generate();
        $patient->save();

        return redirect()
            ->route('patient-management.index')
            ->with('success', 'Data pasien baru berhasil ditambahkan!');
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.edit', compact('patient'));
    }

    public function update(UpdatePatient $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->fill($request->validated());
        $patient->save();

        return redirect()->route('patient-management.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patient-management.index')->with('success', 'Data pasien berhasil dihapus!');
    }
}
