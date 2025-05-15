<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Department;
use App\Models\Program;
use App\Models\Subject;
use App\Models\University;
use App\Models\State;
use App\Models\AdmissionRequirement;
use App\Models\StudentContact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Mail\StudentContactConfirmation;
use App\Mail\AdminStudentContactNotification;
use Illuminate\Support\Facades\Mail;

class FrontUniversityController extends Controller
{
    public function universityList(Request $request)
{
    $validatedData = $request->validate([
        'country' => 'array', 
        // 'country.*' => 'integer|exists:countries,id',
        'gpa' => 'nullable|numeric|min:0',
    'gre' => 'nullable|numeric|min:0',
    'toefl' => 'nullable|numeric|min:0',
    'ielts' => 'nullable|numeric|min:0',
    'pte' => 'nullable|numeric|min:0',
    'det' => 'nullable|numeric|min:0',
    ]);

    $universityCount = University::where('status', 'ACTIVE')->where('is_featured', 1)->count();
    $locations = Country::all(); 
    $departments = Department::all(); 
    $subjects = Subject::all(); 
    $programs = Program::all(); 
    $state = State::all(); 

    // Get the selected filters from the request
    $selectedCountries = $request->input('country', []);
    $selectedState = $request->input('state', []);
    $showScholarships = $request->input('scholarship', false);
    $selectedProgram = $request->input('program', []);
    $selectedDepartment = $request->input('department');
    $selectedSubject = $request->input('subject', []);

    $query = DB::table('universities')
        ->leftJoin('admission_requirements', 'universities.id', '=', 'admission_requirements.university_id')
        ->leftJoin('scholarships', 'universities.id', '=', 'scholarships.university_id')
        ->leftJoin('tuition_fees', 'universities.id', '=', 'tuition_fees.university_id')
        ->leftJoin('countries', 'universities.country_id', '=', 'countries.id')
        ->leftJoin('program_details', 'universities.id', '=', 'program_details.university_id')
        ->leftJoin('programs', 'program_details.program_id', '=', 'programs.id')
        ->select(
            'universities.id',
            'universities.name',
            'universities.phone',
            'universities.featured_image',
            'universities.description',
            'universities.website',
            'universities.slug',
            'universities.email',
            'universities.address',
            'universities.logo',
            'admission_requirements.gpa',
            'admission_requirements.gre',
            'admission_requirements.toefl',
            'admission_requirements.ielts',
            'admission_requirements.pte',
            'admission_requirements.det',
            'scholarships.scholarship_available',
            'scholarships.scholarship_pdf',
            'tuition_fees.amount',
            'countries.id as country_id',
            'countries.country_name as country_name',
            DB::raw('GROUP_CONCAT(DISTINCT programs.program_name ORDER BY programs.program_name SEPARATOR ", ") as programs_list')
        )
        ->groupBy(
            'universities.id',
            'universities.name',
            'universities.phone',
            'universities.featured_image',
            'universities.description',
            'universities.website',
            'universities.slug',
            'universities.email',
            'universities.address',
            'universities.logo',
            'admission_requirements.gpa',
            'admission_requirements.gre',
            'admission_requirements.toefl',
            'admission_requirements.ielts',
            'admission_requirements.pte',
            'admission_requirements.det',
            'scholarships.scholarship_available',
            'scholarships.scholarship_pdf',
            'tuition_fees.amount',
            'countries.id',
            'countries.country_name'
        )
        ->where('is_featured', 1)
        ->where('universities.status', 'ACTIVE');

    // if (!empty($selectedCountries)) {
    //     $query->whereIn('universities.country_id', $selectedCountries);
    // }
    if (!empty($selectedCountries)) {
        $query->where(function ($subQuery) use ($selectedCountries) {
            $subQuery->whereIn('countries.id', $selectedCountries) // Check for IDs
                     ->orWhereIn('countries.country_name', $selectedCountries); // Check for names
        });
    }    
    if (!empty($selectedState)) {
        $query->whereIn('universities.state_id', $selectedState);
    }
    if ($selectedProgram) {
    if ($selectedProgram[0] != null) {
        $query->where('program_details.program_id', $selectedProgram);
    }
    }
    if ($selectedDepartment) {
        $query->where('program_details.department_id', $selectedDepartment);
    }
    if ($selectedSubject) {
        $query->where('program_details.subject_id', $selectedSubject);
    }
    if ($showScholarships) {
        $query->where('scholarships.scholarship_available', 1);
    }
    // if ($request->filled('gpa')) {  
    //     $query->where('admission_requirements.gpa', '>=', $request->input('gpa'));
    // }
    // if ($request->filled('gre')) {
    //     $query->where('admission_requirements.gre', '>=', $request->input('gre'));
    // }
    // if ($request->filled('toefl')) {
    //     $query->where('admission_requirements.toefl', '>=', $request->input('toefl'));
    // }
    // if ($request->filled('ielts')) {
    //     $query->where('admission_requirements.ielts', '>=', $request->input('ielts'));
    // }
    // if ($request->filled('pte')) {
    //     $query->where('admission_requirements.pte', '>=', $request->input('pte'));
    // }
    // if ($request->filled('det')) {
    //     $query->where('admission_requirements.det', '>=', $request->input('det'));
    // }
    if ($request->filled('gpa')) {  
        $query->where('admission_requirements.gpa', '>=', $request->input('gpa'));
    }
    
    if ($request->filled('gre') && !$request->filled('gre_estimated')) {
        // Only apply GRE filter if "I haven’t taken this test yet" is NOT checked
        $query->where('admission_requirements.gre', '>=', $request->input('gre'));
    } elseif ($request->filled('gre_estimated')) {
        // Include universities where GRE is not required
        $query->whereNull('admission_requirements.gre');
    }
    
    if ($request->filled('toefl') && !$request->filled('toefl_estimated')) {
        $query->where('admission_requirements.toefl', '>=', $request->input('toefl'));
    } elseif ($request->filled('toefl_estimated')) {
        $query->whereNull('admission_requirements.toefl');
    }
    
    if ($request->filled('ielts') && !$request->filled('ielts_estimated')) {
        $query->where('admission_requirements.ielts', '>=', $request->input('ielts'));
    } elseif ($request->filled('ielts_estimated')) {
        $query->whereNull('admission_requirements.ielts');
    }
    
    if ($request->filled('pte') && !$request->filled('pte_estimated')) {
        $query->where('admission_requirements.pte', '>=', $request->input('pte'));
    } elseif ($request->filled('pte_estimated')) {
        $query->whereNull('admission_requirements.pte');
    }
    
    if ($request->filled('det') && !$request->filled('det_estimated')) {
        $query->where('admission_requirements.det', '>=', $request->input('det'));
    } elseif ($request->filled('det_estimated')) {
        $query->whereNull('admission_requirements.det');
    }
    
    
    $query = $query->paginate(5);

    return view('front.universities-list', compact('state', 'subjects', 'locations', 'departments', 'programs', 'query', 'universityCount'));
}
public function getStates($countryId)
{
    $states = State::where('country_id', $countryId)->get(['id', 'state_name']);
    return response()->json($states);
}
public function getDepartments($programId)
{
    $departments = Department::where('program_id', $programId)->get();
    return response()->json($departments);
}

public function getSubjects($departmentId)
{
    $subjects = Subject::where('department_id', $departmentId)->get();
    return response()->json($subjects);
}

public function listing($slug)
{
    $locations = Country::all(); 
    $departments = Department::all(); 
    $subjects = Subject::all(); 
    $programs = Program::all(); 
    $state = State::all(); 
    // Fetch the university details along with program details, departments, and subjects
    $university = University::with([
            'programDetails.program',
            'programDetails.department',
            'programDetails.subject',
            'country',
            'admissionRequirements',
            'scholarship',
            'tuitionFee',
            'galleries'
        ])
        ->where('slug', $slug)
        ->firstOrFail();  // Get the university by slug

    // Check if there are photos and convert them to an array
    if ($university->galleries) {
        $university->photos = $university->galleries->pluck('photo')->toArray();
    }

    // Structure program data
    $structuredPrograms = $university->programDetails->groupBy('program_id')->map(function ($programGroup) {
        return [
            'program_id' => $programGroup->first()->program->id,
            'program_name' => $programGroup->first()->program->program_name,
            'departments' => $programGroup->groupBy('department_id')->map(function ($departmentGroup) {
                return [
                    'department_id' => $departmentGroup->first()->department->id,
                    'department_name' => $departmentGroup->first()->department->name,
                    'subjects' => $departmentGroup->map(function ($subject) {
                        return [
                            'subject_id' => $subject->subject->id,
                            'subject_name' => $subject->subject->subject_name,
                        ];
                    })->values(),
                ];
            })->values(),
        ];
    })->values();

    // Attach structured programs to the university object
    $university->programs = $structuredPrograms;

    // Fetch similar universities
    $similarUniversities = University::select('id', 'name', 'slug', 'phone', 'featured_image')
        ->where('id', '!=', $university->id)
        ->where('status', 'ACTIVE')
        ->where('country_id', $university->country_id)
        ->limit(10)
        ->get();

    return view('front.listing', compact('university', 'similarUniversities','locations','departments','subjects','programs','state'));
}

public function programsDetails(){
    $locations = Country::all(); 
    $departments = Department::all(); 
    $subjects = Subject::all(); 
    $programs = Program::all(); 
    $state = State::all(); 

    $programs = Program::leftJoin('program_details', 'programs.id', '=', 'program_details.program_id')
    ->leftJoin('universities', 'program_details.university_id', '=', 'universities.id')
    ->select(
        'programs.id', 
        'programs.program_name',
        DB::raw('COUNT(DISTINCT universities.id) as universities_count')
    )
    ->where('programs.status', 'active')
    ->groupBy('programs.id', 'programs.program_name')
    ->orderByDesc('universities_count')
    ->get();

    return view('front.programs', compact('programs','locations','departments','subjects','programs','state'));
}
public function admission(Request $request)
{
    $locations = Country::all(); 
    $departments = Department::all(); 
    $subjects = Subject::all(); 
    $programs = Program::all(); 
    $state = State::all(); 

    $selectedProgram = $request->input('program');

    $admissionRequirementsQuery = AdmissionRequirement::with(['university', 'program', 'department', 'subject'])
        ->whereHas('university'); 

    if ($selectedProgram) {
        $admissionRequirementsQuery->where('program_id', $selectedProgram);
    }

    $admissionRequirements = $admissionRequirementsQuery->paginate(5);

    return view('front.admission', compact('admissionRequirements', 'selectedProgram','locations','departments','subjects','programs','state'));
}

public function contact(){
    return view('front.contact');
}
public function signIn(){
    return view('front.signIn');
}
public function signUp(){
    return view('front.signUp');
}
// Student information store
// public function store(Request $request)
// {
//     $validator = Validator::make($request->all(), [
//         'full_name' => 'required|string|max:255',
//         'email' => 'required|email|max:255|unique:student_contacts,email',
//         'phone' => 'required|string|max:20|unique:student_contacts,phone',
//         'program_id' => 'required|exists:programs,id',
//         'department_ids' => 'required|array',
//         'department_ids.*' => 'exists:departments,id',
//         'message' => 'nullable|string',
//     ]);

//     if ($validator->fails()) {
//         return response()->json(['errors' => $validator->errors()], 422);
//     }

//     $student = StudentContact::create([
//         'university_id' => $request->university_id,
//         'full_name' => $request->full_name,
//         'email' => $request->email,
//         'phone' => $request->phone,
//         'message' => $request->message,
//         'program_id' => $request->program_id,
//         'department_ids' => implode(',', $request->department_ids), 
//     ]);

//     Mail::to($student->email)->send(new StudentContactConfirmation($student));

//     $adminEmail = 'krushnashivdayalwadichar1999@gmail.com';
//     Mail::to($adminEmail)->send(new AdminStudentContactNotification($student));

//     return response()->json(['message' => 'Details have been sent successfully!']);
// }
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:student_contacts,email',
        'phone' => 'required|string|max:20|unique:student_contacts,phone',
        'program_id' => 'required|exists:programs,id',
        'department_ids' => 'required|array',
        'department_ids.*' => 'exists:departments,id',
        'message' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        $errors = $validator->errors();

        // Custom error messages for email and phone uniqueness
        if ($errors->has('email')) {
            $errors->add('email', 'The email address already exists.');
        }
        if ($errors->has('phone')) {
            $errors->add('phone', 'The phone number already exists.');
        }

        return response()->json(['errors' => $errors], 422);
    }

    $student = StudentContact::create([
        'university_id' => $request->university_id,
        'full_name' => $request->full_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
        'program_id' => $request->program_id,
        'department_ids' => implode(',', $request->department_ids),
    ]);

    $universityName = University::find($request->university_id)->name;
    $programName = Program::find($request->program_id)->program_name;
    $departmentNames = Department::whereIn('id', $request->department_ids)->pluck('name')->implode(', ');
    $websiteURL = config('app.url');

    Mail::to($student->email)->send(new StudentContactConfirmation($student, $programName, $departmentNames, $universityName, $websiteURL));

    $adminEmail = config('app.ADMIN_EMAIL');
    // Send notification to admin
    Mail::to($adminEmail)->send(new AdminStudentContactNotification($student));


    return response()->json(['message' => 'Details have been sent successfully!']);
}


}