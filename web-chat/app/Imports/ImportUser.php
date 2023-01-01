<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id'=>$row[0],
            'fname'=>$row[1],
            'lname'=>$row[2],
            'email'=>$row[3],
            'phone'=>$row[4],
            'password'=>bcrypt($row[5]),
            'img'=>$row[6],
            'active'=>$row[7],
        ]);
    }
}
