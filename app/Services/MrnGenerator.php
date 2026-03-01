<?php

namespace App\Services;

use App\Models\Patient;
use Illuminate\Support\Str;

class MrnGenerator
{
    /**
     * Generate a unique Medical Record Number (MRN)
     * Format: MR + YYYY + 6-digit sequential number per year
     * Example: MR2026-000001
     *
     * @return string
     */
    public static function generate(): string
    {
        $year = now()->format('Y');

        // Ambil pasien terakhir di tahun ini
        $lastPatient = Patient::withTrashed()
            ->whereYear('created_at', $year)
            ->latest()
            ->first();

        // Ambil nomor terakhir, default 0
        $lastNumber = 0;
        if ($lastPatient) {
            // Ambil 6 digit terakhir dari MRN
            $lastNumber = intval(substr($lastPatient->medical_record_number, -6));
        }

        // Nomor baru
        $newNumber = str_pad($lastNumber + 1, 6, '0', STR_PAD_LEFT);

        return "MR{$year}-{$newNumber}";
    }
}
