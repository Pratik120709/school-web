<?php

namespace App\Exports;

use App\Models\StudentContact;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentContactExport implements FromCollection, WithHeadings, WithMapping
{
    protected $universityId;
    private $counter = 1;
    /**
     * Fetch the collection of student contacts.
     *
     * @return \Illuminate\Support\Collection
     */
    public function __construct($universityId = null)
    {
        $this->universityId = $universityId;
    }
    public function collection()
    {
        if ($this->universityId) {
            return StudentContact::where('university_id', $this->universityId)->get();
        }

        return StudentContact::all(); // Return all if no filter is applied
    }
    public function view(): View
    {
        // Fetch the data based on the university ID
        $studentContacts = StudentContact::when($this->universityId, function ($query) {
            return $query->where('university_id', $this->universityId);
        })->with('university', 'program')->get();

        return view('exports.student_contacts', [
            'studentContacts' => $studentContacts
        ]);
    }



    /**
     * Define the headings for the Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Sr.No',
            'Full Name',
            'Email',
            'Phone',
            'Message',
            'University',
            'Program',
            'Departments',
        ];
    }

    /**
     * Map the data to the Excel rows.
     *
     * @param  StudentContact  $studentContact
     * @return array
     */
    public function map($studentContact): array
    {
        return [
            $this->counter++, 
            $studentContact->full_name,
            $studentContact->email,
            $studentContact->phone,
            $studentContact->message,
            $studentContact->university ? $studentContact->university->name : 'N/A',
            $studentContact->program ? $studentContact->program->name : 'N/A',
            implode(', ', $studentContact->department_names), // Assuming getDepartmentNamesAttribute is defined
        ];
    }
}
