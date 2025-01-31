<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    protected $class_id;
    protected $date;

    public function __construct($class_id = null, $date = null)
    {
        $this->class_id = $class_id;
        $this->date = $date;
    }

    public function collection()
    {
        $query = Attendance::with('student.user', 'class')->orderBy('date', 'desc');

        if ($this->class_id) {

            $query->where('class_id', $this->class_id);
        }

        if ($this->date) {

            $query->where('date', $this->date);
        }

        return $query->get()->map(function ($att) {

            return [
                'Date' => $att->date,
                'Class' => $att->class->name,
                'Student' => $att->student->user->name,
                'Status' => ucfirst($att->status),
            ];
        });
    }

    public function headings(): array
    {
        return ['Date', 'Class', 'Student', 'Status'];
    }
}
