<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentExport implements FromCollection, WithHeadings, WithStyles

{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Student::join('grade', 'student.idGrade', '=', 'grade.idGrade')
            ->join('major', 'major.idMajor', '=', 'grade.idMajor')
            ->join('course', 'grade.idCourse', '=', 'course.idCourse')
            ->join('scholarship', 'student.idScholarship', '=', 'scholarship.idScholarship')
            ->join('paymentoption', 'student.idPaymentOption', '=', 'paymentoption.idPaymentOption')
            ->select('nameStudent', 'email', 'dateBirth', 'gender', 'grade.nameGrade', 'major.nameMajor', 'course.nameCourse', 'paymentoption.namePaymentOption', 'scholarship.fee', 'debtfees')
            ->get();
        return $data;
    }
    public function headings(): array
    {
        return [
            'Tên',
            'Email',
            'Ngày sinh',
            'Giới tính',
            'Lớp',
            'Ngành',
            'Khóa',
            'Hình thức nộp',
            'Học bổng',
            'Học phí còn nợ',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
