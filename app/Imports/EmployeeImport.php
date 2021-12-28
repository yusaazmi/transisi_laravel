<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;


class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'id' => Uuid::uuid4()->toString(),
            'nama' => $row[0],
            'company' => null,
            'email' => $row[1],
        ]);
    }
}
