<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $UNIX_DATE = ($row["ngay_sinh"] - 25569) * 86400;
        $data = [
            "nameStudent" => $row["ten"],
            "gender" => ($row["gioi_tinh"] == 'Nam') ? 1 : 0,
            "dateBirth" => gmdate("Y-m-d", $UNIX_DATE),
            "address" => $row["dia_chi"],
            "email" => $row["email"],
            "idGrade" => ($row["lop"] =='BKD08K11')?1 : 2 ,
            "idPaymentOption" => ($row["hinh_thuc_nop_hoc_phi"]=='Tháng')?1 : 2,
            "idScholarship" =>( $row["hoc_bong"]==1000000)?1:2,
            "debtfees" =>($row["hinh_thuc_nop_hoc_phi"]== 'Tháng')?800000:4000000  
        ];
        return new Student($data);
    }
}
