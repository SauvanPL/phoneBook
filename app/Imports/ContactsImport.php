<?php

namespace App\Imports;

use App\contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new contact([
           auth()->user(),
            'user_id'    => $row[1],
            'name'     => $row[2],
            'number'    => $row[3],


        ]);
    }
}
