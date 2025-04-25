<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class LeadsImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    /**
    * @param Collection $row
    *
    */
    public function collection(Collection $rows)
    {
        $data = [];

        foreach ($rows as $row) {
            $data[] = [
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'email' => $row['email'],
                'personal_phone' => $row['personal_phone'],
                'description' => $row['description'] ?? null,
                'address' => $row['address'] ?? null,
                'business_phone' => $row['business_phone'] ?? null,
                'home_phone' => $row['home_phone'] ?? null,
                'nationality' => $row['nationality'] ?? null,
                'country_of_residence' => $row['country_of_residence'] ?? null,
                'dob' => $row['dob'] ?? null,
                'gender' => $row['gender'] ?? null,
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            ];
        }

        Lead::insert($data);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
