<?php

namespace App\Imports;

use App\contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new contact([
            'id'     => $row['id'],
            'user_id'    => $row['user_id'],
            'name'     => $row['name'],
            'number'    => $row['number'],
            'updated_at'     => $row['updated_at'],
            'created_at'    => $row['created_at'],

        ]);
    }
}
