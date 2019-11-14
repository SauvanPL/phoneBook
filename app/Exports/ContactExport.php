<?php

namespace App\Exports;

use App\contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return contact::where('user_id','like', auth()->user()->id)->get();
    }
}
