<?php

namespace App\Http\Controllers;

use App\Models\PatientRegistration;
use App\Models\Transaction;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index($id)
    {
        $registration = PatientRegistration::with(['patient', 'insurance', 'service_room'])->where('id', $id)->first();
        $transactions = Transaction::with(['treatment'])->where('patient_registration_id', $id)->get();
        $treatments = Treatment::all();

        return view('registration.transaction.index', compact('registration', 'transactions', 'treatments'));
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'treatment_id' => 'required|exists:treatments,id',
            'amount' => 'required|numeric|min:0',
        ]);

        Transaction::create([
            'patient_registration_id' => $id,
            'treatment_id' => $validatedData['treatment_id'],
            'amount' => $validatedData['amount'],
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function update(Request $request, $transId)
    {
        $validatedData = $request->validate([
            'treatment_id' => 'required|exists:treatments,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $transaction = Transaction::findOrFail($transId);
        $transaction->update([
            'treatment_id' => $validatedData['treatment_id'],
            'amount' => $validatedData['amount'],
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($transId)
    {
        $transaction = Transaction::findOrFail($transId);
        $transaction->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus.');
    }
}

