<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Program;
use App\Models\Subject;
use App\Models\Department;
use App\Models\University;
use App\Models\ProgramDetail;
use App\Models\Scholarship;
use App\Models\TuitionFee;
use App\Models\AdmissionRequirement;
use App\Models\Gallery;
use App\Models\StudentContact;
use App\Exports\StudentContactExport;
use App\Models\MediaFile;
use App\Models\FailedUniversity;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function University(){

        $failedUniversityCount = FailedUniversity::count(); 

        $university = University::orderBy('created_at', 'desc')
            ->leftJoin('countries', 'universities.country_id', '=', 'countries.id')
            ->leftJoin('states', 'universities.state_id', '=', 'states.id')
            ->leftJoin('scholarships', 'universities.id', '=', 'scholarships.university_id') 
            ->select(
                'universities.*', 
                'countries.country_name as country_name', 
                'states.state_name as state_name',
                'scholarships.scholarship_available as scholarship_available',
                'scholarships.scholarship_pdf as scholarship_pdf'
            )
            ->get();
        return view('Admin.university.university', compact('university','failedUniversityCount'));
    }
    
     public function addUniversity(){
      $countries = Country::select('id', 'country_name','flag')->where('status', 'ACTIVE')->orderBy('country_name')->get();
      $states = State::select('id', 'state_name')->where('status', 'ACTIVE')->orderBy('state_name')->get();
      $programs = Program::where('status', 'ACTIVE')->get();
      $subjects = Subject::where('status', 'ACTIVE')->get();
      $departments = Department::where('status', 'ACTIVE')->get();
        return view('Admin.university.addUniversity',compact('countries','programs','subjects','departments','states'));
     }  

    public function storeUniversity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:universities,name',
            'slug' => 'nullable|string|max:255|unique:universities,slug',
            'website' => 'required|url',
            'phone' => 'required|string|max:20|unique:universities,phone',
            'email' => 'required|email|max:255|unique:universities,email',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'address' => 'required|string',
            'is_featured' => 'nullable|boolean',
            'fees' => 'required|string|min:0',
            'level' => 'required|string|max:50',
            'ranking' => 'required|string|max:50',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'required|string',
            'status' => 'required|in:ACTIVE,INACTIVE',
            'group-a.*.program_id' => 'required|exists:programs,id',
            'group-a.*.department_id' => 'required|exists:departments,id',
            'group-a.*.subject_id' => 'required|exists:subjects,id',
            'scholarship_available' => 'required|boolean',
            'scholarship_pdf' => 'nullable|file|mimes:pdf|max:2048|required_if:scholarship_available,1',
            'amount' => 'required|numeric|min:0',
            'payment_frequency' => 'required|in:ANNUAL,SEMESTER',
            'gpa' => 'required|numeric|min:0',
            'gre' => 'nullable|numeric|min:0',
            'toefl' => 'nullable|numeric|min:0',
            'ielts' => 'nullable|numeric|min:0',
            'pte' => 'nullable|numeric|min:0',
            'det' => 'nullable|numeric|min:0',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'photo.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Please correct the errors.');
        }
    
        DB::beginTransaction();
    
        try {
        
            $data = new University;
            $data->name = $request->input('name');
            $data->slug = Str::slug($request->input('name'));
            $data->website = $request->input('website');
            $data->phone = $request->input('phone');
            $data->email = $request->input('email');
            $data->country_id = $request->input('country_id');
            $data->state_id = $request->input('state_id');
            $data->address = $request->input('address');
            $data->is_featured = $request->input('is_featured', 0);
            $data->fees = $request->input('fees');
            $data->level = $request->input('level');
            $data->ranking = $request->input('ranking');
            $data->longitude = $request->input('longitude');
            $data->latitude = $request->input('latitude');
            $data->description = $request->input('description');
            $data->status = $request->input('status');
    
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('/assets/images/universities/logo/'), $logoName);
                $data->logo = '/assets/images/universities/logo/' . $logoName;
            }

            if ($request->hasFile('featured_image')) {
                $featuredImage = $request->file('featured_image');
                $featuredImageName = time() . '_featured.' . $featuredImage->getClientOriginalExtension();
                $featuredImage->move(public_path('/assets/images/universities/featured/'), $featuredImageName);
                $data->featured_image = '/assets/images/universities/featured/' . $featuredImageName;
            }
    

            if ($request->hasFile('banner_image')) {
                $bannerImage = $request->file('banner_image');
                $bannerImageName = time() . '_banner.' . $bannerImage->getClientOriginalExtension();
                $bannerImage->move(public_path('/assets/images/universities/banner/'), $bannerImageName);
                $data->banner_image = '/assets/images/universities/banner/' . $bannerImageName;
            }
    
            $data->save();

            $dataId = $data->id;
            
           
                $programDetails = $request->input('group-a', []);
                    foreach ($programDetails as $detail) {
                        if (!empty($detail['program_id']) && !empty($detail['department_id']) && !empty($detail['subject_id'])) {
                            ProgramDetail::create([
                                'university_id' => $dataId,
                                'program_id' => $detail['program_id'],
                                'department_id' => $detail['department_id'],
                                'subject_id' => $detail['subject_id'],
                                'status' => $detail['status'] ?? 'ACTIVE',
                            ]);
                        }
                    }
            
                    $scholarshipPdfPath = null;
                    if ($request->hasFile('scholarship_pdf')) {
                        $scholarshipPdf = $request->file('scholarship_pdf');
                        $scholarshipPdfName = time() . '.' . $scholarshipPdf->getClientOriginalExtension();
                        $scholarshipPdf->move(public_path('/assets/documents/scholarships/'), $scholarshipPdfName);
                        $scholarshipPdfPath = '/assets/documents/scholarships/' . $scholarshipPdfName;
                    }
                
                    Scholarship::create([
                        'university_id' => $dataId,
                        'scholarship_available' => $request->input('scholarship_available'),
                        'scholarship_pdf' => $scholarshipPdfPath,
                        'status' => $request->input('status', 'ACTIVE'),
                    ]);
        
                            TuitionFee::create([
                                'university_id' => $dataId,
                                'amount' => $request['amount'],
                                'payment_frequency' => $request['payment_frequency'],
                                'program_id' => $detail['program_id'],
                                'department_id' => $detail['department_id'],
                                'subject_id' => $detail['subject_id'],
                                'status' => $request['status'] ?? 'ACTIVE',
                            ]);
                
                        if ($request->hasFile('pdf')) {
                            $admissionPdf = $request->file('pdf');
                            $admissionPdfName = time() . '.' . $admissionPdf->getClientOriginalExtension();
                            $admissionPdf->move(public_path('/assets/documents/admissions/'), $admissionPdfName);
                            $request->pdf = '/assets/documents/admissions/' . $admissionPdfName;
                        }
            
                        AdmissionRequirement::create([
                            'university_id' => $dataId,
                            'program_id' => $detail['program_id'],
                            'department_id' => $detail['department_id'] ?? null,
                            'subject_id' => $detail['subject_id'] ?? null,
                            'gpa' => $request['gpa'] ?? null,
                            'gre' => $request['gre'] ?? null,
                            'toefl' => $request['toefl'] ?? null,
                            'ielts' => $request['ielts'] ?? null,
                            'pte' => $request['pte'] ?? null,
                            'det' => $request['det'] ?? null,
                            'status' => $request['status'] ?? 'ACTIVE',
                            'pdf' => $request->pdf ?? null,
                        ]);
    
                        if ($request->hasFile('photo')) {
                            foreach ($request->file('photo') as $file) {
                                $galleryImageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                                $file->move(public_path('/assets/images/universities/gallery/'), $galleryImageName);
                                
                                Gallery::create([
                                    'university_id' => $dataId,
                                    'status' => $request['status'] ?? 'ACTIVE',
                                    'photo' => '/assets/images/universities/gallery/' . $galleryImageName, 
                                ]);
                            }
                        }
                        
    
            DB::commit();
    
            return redirect()->route('admin.university.university')->with('message', 'University added successfully.');
    
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('University creation failed: ' . $e->getMessage()); // Log the error message
            return redirect()->back()->with('error', 'An error occurred while adding the university. Please try again.');
        }
        
    }
    

    public function editUniversity($id)
    {
      
        $university = University::find($id);
        $countries = Country::where('status', 'ACTIVE')->get();
        $states = State::where('status', 'ACTIVE')->get();
        $programs = Program::where('status', 'ACTIVE')->get();
        $subjects = Subject::where('status', 'ACTIVE')->get();
        $departments = Department::where('status', 'ACTIVE')->get();
        $programDetails = ProgramDetail::where('university_id', $id)->get();
        $scholarshipDetails = Scholarship::where('university_id', $id)->first();
        $tuitionFees = TuitionFee::where('university_id', $id)->get();
        $admissionRequirements = AdmissionRequirement::where('university_id', $id)->first();
        $galleryImage = Gallery::where('university_id', $id)->get();

    
        return view('Admin.university.editUniversity', compact('countries', 'states', 'programs', 'subjects', 'departments', 'university', 'programDetails', 'scholarshipDetails', 'tuitionFees', 'admissionRequirements','galleryImage'));
    }
    
    
public function updateUniversity(Request $request, $id)
{

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'website' => 'required|url',
        'phone' => 'required|string|max:20',
        'email' => 'required|email',
        'country_id' => 'required|integer|exists:countries,id',
        'state_id' => 'required|integer|exists:states,id',
        'address' => 'required|string|max:500',
        'is_featured' => 'nullable|boolean',
        'fees' => 'required|string',
        'level' => 'required|string|max:50',
        'ranking' => 'required|integer',
        'longitude' => 'required|numeric',
        'latitude' => 'required|numeric',
        'description' => 'required|string',
        'status' => 'required|string|in:ACTIVE,INACTIVE',

        'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        // 'pdf' => 'nullable|file|mimes:pdf|max:2048',
        // 'scholarship_pdf' => 'nullable|file|mimes:pdf|max:2048|required_if:scholarship_available,1',
        'pdf' => 'nullable|file|mimes:pdf',
        'photo.*' => 'nullable|image|mimes:jpeg,png,jpg',

        'group-a.*.program_id' => 'required|integer|exists:programs,id',
        'group-a.*.department_id' => 'required|integer|exists:departments,id',
        'group-a.*.subject_id' => 'required|integer|exists:subjects,id',
        'photo.*' => 'nullable|image|mimes:jpeg,png,jpg,webp',
    ]);
  

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Please correct the errors.');
    }

    DB::beginTransaction();
    
    $data = University::findOrFail($id);
    $data->name = $request->input('name');
    $data->slug = Str::slug($request->input('name'));
    $data->website = $request->input('website');
    $data->phone = $request->input('phone');
    $data->email = $request->input('email');
    $data->country_id = $request->input('country_id');
    $data->state_id = $request->input('state_id');
    $data->address = $request->input('address');
    $data->is_featured = $request->input('is_featured', 0);
    $data->fees = $request->input('fees');
    $data->level = $request->input('level');
    $data->ranking = $request->input('ranking');
    $data->longitude = $request->input('longitude');
    $data->latitude = $request->input('latitude');
    $data->description = $request->input('description');
    $data->status = $request->input('status');

    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $logoName = time() . '.' . $logo->getClientOriginalExtension();
        $logo->move(public_path('/assets/images/universities/logo/'), $logoName);
        $data->logo = '/assets/images/universities/logo/' . $logoName;
    }

    if ($request->hasFile('featured_image')) {
        $featuredImage = $request->file('featured_image');
        $featuredImageName = time() . '.' . $featuredImage->getClientOriginalExtension();
        $featuredImage->move(public_path('/assets/images/universities/featured/'), $featuredImageName);
        $data->featured_image = '/assets/images/universities/featured/' . $featuredImageName;
    }

    if ($request->hasFile('banner_image')) {
        $bannerImage = $request->file('banner_image');
        $bannerImageName = time() . '.' . $bannerImage->getClientOriginalExtension();
        $bannerImage->move(public_path('/assets/images/universities/banner/'), $bannerImageName);
        $data->banner_image = '/assets/images/universities/banner/' . $bannerImageName;
    }

    $data->save();

    ProgramDetail::where('university_id', $id)->delete();
    $programDetails = $request->input('group-a', []);
    foreach ($programDetails as $detail) {
        if (!empty($detail['program_id']) && !empty($detail['department_id']) && !empty($detail['subject_id'])) {
            ProgramDetail::create([
                'university_id' => $data->id,
                'program_id' => $detail['program_id'],
                'department_id' => $detail['department_id'],
                'subject_id' => $detail['subject_id'],
                'status' => $detail['status'] ?? 'ACTIVE',
            ]);
        }
    }
    $scholarshipPdfPath = null;
    if ($request->hasFile('scholarship_pdf')) {
        $scholarshipPdf = $request->file('scholarship_pdf');
        $scholarshipPdfName = time() . '.' . $scholarshipPdf->getClientOriginalExtension();
        $scholarshipPdf->move(public_path('/assets/documents/scholarships/'), $scholarshipPdfName);
        $scholarshipPdfPath = '/assets/documents/scholarships/' . $scholarshipPdfName;
    } else {
        $scholarshipDetails = Scholarship::where('university_id', $id)->first();
        $scholarshipPdfPath = $scholarshipDetails ? $scholarshipDetails->scholarship_pdf : null;
    }

    Scholarship::updateOrCreate(
        ['university_id' => $id],
        [
            'scholarship_available' => $request->input('scholarship_available', 0),
            'status' => $request->input('status', 'ACTIVE'),
            'scholarship_pdf' => $scholarshipPdfPath,
        ]
    );

    // Handling Tuition Fees (if any)
    $tuitionFees = $request->input('tuition_fees', []);
    foreach ($tuitionFees as $fee) {
        if (!empty($fee['id'])) {
            $tuitionFee = TuitionFee::find($fee['id']);
            if ($tuitionFee) {
                $tuitionFee->update([
                    'amount' => $fee['amount'],
                    'payment_frequency' => $fee['payment_frequency'],
                    'program_id' => $fee['program_id'] ?? $tuitionFee->program_id,
                    'department_id' => $fee['department_id'] ?? null,
                    'subject_id' => $fee['subject_id'] ?? null,
                    'status' => $fee['status'] ?? 'ACTIVE',
                ]);
            }
        }
    }

    $admissionRequirement = AdmissionRequirement::where('university_id', $id)->first();

    $pdfPath = null;
    if ($request->hasFile('pdf')) {
        $admissionPdf = $request->file('pdf');
        $admissionPdfName = time() . '.' . $admissionPdf->getClientOriginalExtension();
        $admissionPdf->move(public_path('/assets/documents/admissions/'), $admissionPdfName);
        $pdfPath = '/assets/documents/admissions/' . $admissionPdfName;
    } else {
        $pdfPath = $admissionRequirement ? $admissionRequirement->pdf : null;
    }

    AdmissionRequirement::updateOrCreate(
                                    ['university_id' => $id],
                                    [
                                        'program_id' => $detail['program_id'],
                                        'department_id' => $detail['department_id'],
                                        'subject_id' => $detail['subject_id'],
                                        'gpa' => $request['gpa'],
                                        'gre' => $request['gre'],
                                        'toefl' => $request['toefl'],
                                        'ielts' => $request['ielts'],
                                        'pte' => $request['pte'],
                                        'det' => $request['det'],
                                        'status' => $request['status'] ?? 'ACTIVE',
                                        'pdf' => $pdfPath,  
                                    ]
                                );
                                
    if ($request->hasFile('photo')) {
        foreach ($request->file('photo') as $file) {
            $galleryImageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/assets/images/universities/gallery/'), $galleryImageName);
            
            Gallery::create([
                'university_id' => $id,
                'status' => $request['status'] ?? 'ACTIVE',
                'photo' => '/assets/images/universities/gallery/' . $galleryImageName,
            ]);
        }
    }

    DB::commit();

    return redirect()->route('admin.university.university')->with('message', 'University Updated successfully!');
}

public function deleteGalleryImage($galleryId)
{
    $galleryImage = Gallery::find($galleryId);

    if ($galleryImage) {
        $imagePath = public_path($galleryImage->photo);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $galleryImage->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Gallery image deleted successfully.'
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Gallery image not found.'
        ]);
    }
}

public function viewUniversity($id) {
    $university = University::find($id);
    $countries = Country::where('status', 'ACTIVE')->get();
    $states = State::where('status', 'ACTIVE')->get();
    $programs = Program::where('status', 'ACTIVE')->get();
    $subjects = Subject::where('status', 'ACTIVE')->get();
    $departments = Department::where('status', 'ACTIVE')->get();
    $scholarshipDetails = Scholarship::where('university_id', $id)->first();
    $tuitionFees = TuitionFee::where('university_id', $id)->first();
    $admissionRequirements = AdmissionRequirement::where('university_id', $id)->first();
    $programDetails = ProgramDetail::where('university_id', $id)
            ->leftJoin('programs', 'program_details.program_id', '=', 'programs.id')
            ->leftJoin('departments', 'program_details.department_id', '=', 'departments.id')
            ->leftJoin('subjects', 'program_details.subject_id', '=', 'subjects.id')
            ->select(
                'program_details.*', 
                'programs.program_name as program_name', 
                'departments.name as department_name', 
                'subjects.subject_name as subject_name'
            )
            ->get();

    $galleryImages = Gallery::where('university_id', $id)->get(); 
    return view('Admin.university.viewUniversity', compact(
        'countries', 'states', 'programs', 'subjects', 'departments', 'university',
        'programDetails', 'scholarshipDetails', 'tuitionFees', 'admissionRequirements',
        'galleryImages'
    ));
}
public function getStatesByCountry(Request $request, $countryId)
{
    $states = State::where('country_id', $countryId)->pluck('state_name', 'id');
    $html = '<option value="">Select State</option>';
    foreach ($states as $stateId => $stateName) {
        $html .= "<option value='{$stateId}'>{$stateName}</option>";
    }
    return response()->json(['html' => $html]);
}
public function getDepartmentsByProgram($programId)
{
    $departments = Department::where('program_id', $programId)->get();
    return response()->json($departments);
}

public function getSubjectsByDepartment($departmentId)
{
    $subjects = Subject::where('department_id', $departmentId)->get();
    return response()->json($subjects);
}    
public function importUniversities(Request $request)
{
    $this->validate($request, [
        'excel_sheet' => 'required|mimes:xls,xlsx|max:2048',
    ]);

    if ($request->hasFile('excel_sheet')) {
        $result = Excel::toArray(new University, $request->file('excel_sheet'));
        DB::beginTransaction();

        $skippedRows = 0;

        try {
            foreach ($result as $sheet) {
                foreach ($sheet as $key => $row) {
                    if ($key == 0 || empty(array_filter($row))) {
                        $skippedRows++;
                        continue;
                    }
                    $country = Country::select('id')->where('country_name', 'like', '%' . trim($row[4]) . '%')->first();
                    if (!$country) {
                        // Log failure if the country is not found
                        FailedUniversity::create([
                            'university_name' => $row[0],
                            'remark' => 'Country not found: ' . trim($row[4]),
                        ]);
                        $skippedRows++;
                        continue;
                    }

                    // Check if the state exists within the found country
                    $state = State::select('id')->where('state_name', 'like', '%' . trim($row[5]) . '%')->where('country_id', $country->id)->first();
                    if (!$state) {
                        // Log failure if the state is not found
                        FailedUniversity::create([
                            'university_name' => $row[0],
                            'remark' => 'State not found: ' . trim($row[5]) . ' in country: ' . trim($row[4]),
                        ]);
                        $skippedRows++;
                        continue;
                    }


                    $existingUniversity = University::where('name', 'like', '%' . trim($row[0]) . '%')->first();
                    if ($existingUniversity) {
                        // Log failure if the university already exists
                        FailedUniversity::create([
                            'university_name' => $row[0],
                            'remark' => 'This university already exists: ' . $row[0],
                        ]);
                        $skippedRows++;
                        continue;
                    }
                               
                    $phoneNumber = trim($row[2]);
                        if (!preg_match('/^\+?\d{1,3} ?\d{1,4} ?\d{1,4} ?\d{1,4} ?\d{1,4}$/', $phoneNumber)) {
                            FailedUniversity::create([
                                'university_name' => $row[0],
                                'remark' => 'Invalid phone number format: ' . $phoneNumber,
                            ]);
                            $skippedRows++;
                            continue;
                        }

                    $duplicatePhone = University::where('phone', $phoneNumber)->exists();
                    $duplicateEmail = University::where('email', $row[3])->exists();

                    if ($duplicatePhone || $duplicateEmail) {
                        FailedUniversity::create([
                            'university_name' => $row[0],
                            'remark' => 'Duplicate entry found for phone or email. Phone: ' . $phoneNumber . ', Email: ' . $row[3],
                        ]);
                        $skippedRows++;
                        continue;
                    }

                    $university = new University();
                    $university->name = $row[0]; 
                    $university->slug = Str::slug($row[0]);
                    $university->website = $row[1];
                    $university->phone = $phoneNumber;
                    $university->email = $row[3];
                    $university->country_id = $country->id;
                    $university->state_id = $state->id;
                    $university->address = $row[6]; 
                    $university->is_featured = strtolower(trim($row[7])) == 'yes' ? 1 : 0;
                    $university->fees = $row[8]; 
                    $university->level = $row[9];
                    $university->ranking = $row[10];
                    $university->longitude = $row[11];  
                    $university->latitude = $row[12]; 
                    $university->logo = !empty(trim($row[13])) ? trim($row[13]) : null;
                    $university->featured_image = !empty(trim($row[14])) ? trim($row[14]) : null; 
                    $university->banner_image = !empty(trim($row[15])) ? trim($row[15]) : null; 
                    $university->description = $row[16]; 

                    $statusValue = strtoupper(trim($row[17]));
                    $validStatuses = ['ACTIVE', 'INACTIVE'];
                    $university->status = in_array($statusValue, $validStatuses) ? $statusValue : 'ACTIVE';

                    $university->save();
                    $dataId = $university->id;

                    $programDetails = explode('|', trim($row[18])); 
                    foreach ($programDetails as $element) {
                        $parts = explode(':', $element);
                        if (count($parts) == 3) {
                            $programName = trim($parts[0]);   
                            $departmentName = trim($parts[1]); 
                            $subjectName = trim($parts[2]); 

                            $program = Program::firstOrCreate(['program_name' => $programName]);
                            $department = Department::firstOrCreate(['name' => $departmentName, 'program_id' => $program->id]);
                            $subject = Subject::firstOrCreate(['subject_name' => $subjectName, 'program_id' => $program->id, 'department_id' => $department->id]);

                            ProgramDetail::create([
                                'university_id' => $university->id,
                                'program_id' => $program->id,
                                'department_id' => $department->id,
                                'subject_id' => $subject->id,
                                'status' => 'ACTIVE', 
                            ]);
                        }
                    }

                    // Handle scholarship creation with error logging
                    try {
                        if (!empty(trim($row[20]))) { 
                            Scholarship::create([
                                'university_id' => $university->id,
                                'scholarship_available' => strtolower(trim($row[19])) == 'yes' ? 1 : 0,
                                'scholarship_pdf' => !empty(trim($row[20])) ? trim($row[20]) : null,
                                'status' => 'ACTIVE',
                            ]);
                        }
                    } catch (\Exception $e) {
                        FailedUniversity::create([
                            'university_name' => $university->name,
                            'remark' => 'Failed to create scholarship: ' . $e->getMessage(),
                        ]);
                    }

                    // Handle tuition fee creation with error logging
                    try {
                        TuitionFee::create([
                            'university_id' => $university->id,
                            'amount' => $row[21], 
                            'payment_frequency' => $row[22], 
                            'program_id' => $program->id,
                            'department_id' => $department->id,
                            'subject_id' => $subject->id,
                            'status' => 'ACTIVE',
                        ]);
                    } catch (\Exception $e) {
                        FailedUniversity::create([
                            'university_name' => $university->name,
                            'remark' => 'Failed to create tuition fee: ' . $e->getMessage(),
                        ]);
                    }

                    // Handle admission requirement creation with error logging
                    try {
                        if (!empty(trim($row[29]))) {
                            AdmissionRequirement::create([
                                'university_id' => $university->id,
                                'program_id' => $program->id,
                                'department_id' => $department->id ?? null,
                                'subject_id' => $subject->id ?? null,
                                'gpa' => $row[23] ?? null, 
                                'gre' => $row[24] ?? null, 
                                'toefl' => $row[25] ?? null, 
                                'ielts' => $row[26] ?? null, 
                                'pte' => $row[27] ?? null, 
                                'det' => $row[28] ?? null,
                                'status' => 'ACTIVE',
                                'pdf' => !empty(trim($row[29])) ? trim($row[29]) : null,
                            ]);
                        }
                    } catch (\Exception $e) {
                        FailedUniversity::create([
                            'university_name' => $university->name,
                            'remark' => 'Failed to create admission requirements: ' . $e->getMessage(),
                        ]);
                    }

                    // Handle gallery image creation with error logging
                    $galleryImages = explode('|', trim($row[30])); 
                    foreach ($galleryImages as $galleryImage) {
                        $galleryImage = trim($galleryImage);
                        if (!empty($galleryImage)) {
                            try {
                                Gallery::create([
                                    'university_id' => $university->id,
                                    'photo' => $galleryImage, 
                                    'status' => 'ACTIVE', 
                                ]);
                            } catch (\Exception $e) {
                                FailedUniversity::create([
                                    'university_name' => $university->name,
                                    'remark' => 'Failed to create gallery image: ' . $e->getMessage(),
                                ]);
                            }
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.university.university')->with('message', 'Excel sheet imported successfully' . ($skippedRows > 0 ? '' : '.'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to import universities. Error: ' . $e->getMessage());
        }
    }

    return redirect()->back()->with('error', 'No file uploaded.');
}
public function failedUniversity(){
    $failedUniversity = FailedUniversity::get(); 

    return view('Admin.failed_university.failed_university', compact('failedUniversity'));
}
public function deleteFailedRecord($id){
    $failedUniversity = FailedUniversity::find($id);
    if ($failedUniversity) {
        $failedUniversity->delete();
        return redirect()->route('admin.university.failedUniversity')
        ->with('message', 'Failed University record deleted successfully');
    } else {
        return redirect()->route('admin.university.failedUniversity')
        ->with('error', 'Data not found!');
    }
}
public function deleteAllFailedRecord() {
    
    $deletedCount = FailedUniversity::query()->delete();

    if ($deletedCount > 0) {
        return redirect()->route('admin.university.failedUniversity')
            ->with('message', 'All failed University records deleted successfully');
    } else {
        return redirect()->route('admin.university.failedUniversity')
            ->with('error', 'Data not found!');
    }
}

    public function storeImage($imagePath)
    {
        if (file_exists($imagePath)) {
            $filename = uniqid() . '-' . basename($imagePath);
            
            $storedImagePath = Storage::putFileAs('images/universities', $imagePath, $filename);
            
            return $storedImagePath;
        }

        return null; 
    }
    
    public function studentContact()
    {
        $universities = University::all();
    
        $studentContacts = StudentContact::with(['university', 'program'])
                            ->orderBy('created_at', 'desc')
                            ->get();
    
        return view('Admin.student_contact.student_contact', compact('studentContacts', 'universities'));
    }
    
public function filterStudentContacts(Request $request)
{
    $query = StudentContact::with(['university', 'program']);


    if ($request->has('university_id') && !empty($request->university_id)) {
        $query->where('university_id', $request->university_id);
    }

    $studentContacts = $query->get();

    $studentContacts->each(function ($contact) {
        $contact->department_names = $contact->department_names;
    });

    return response()->json($studentContacts);
}

public function export(Request $request)
{
    $universityId = $request->input('university_id');

    return Excel::download(new StudentContactExport($universityId), 'student_contacts.xlsx');
}
public function media(){

    $mediaFiles = MediaFile::orderBy('created_at', 'desc')->get();
    return view('Admin.media.media',compact('mediaFiles'));
}
public function storeMedia(Request $request)
{
    $request->validate([
        'file' => 'required',
        'file.*' => 'mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    if ($request->hasFile('file')) {
        foreach ($request->file('file') as $file) {
            // Create a unique name for the file
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9_.-]/', '_', $file->getClientOriginalName());

            // Define the path where the file should be stored
            $filePath = 'assets/media/' . $fileName;

            // Move the file to the public directory
            $file->move(public_path('assets/media'), $fileName);

            // Store the file path in the database
            MediaFile::create([
                'file' => $filePath, // This should be relative to the public path
            ]);
        }

        return redirect()->route('admin.media')->with('message', 'File(s) uploaded successfully!');
    }

    return redirect()->route('admin.media')->with('error', 'No files uploaded.');
}
public function deleteMediaFile($id)
{

    $deleteMediaFile = MediaFile::find($id);

    if ($deleteMediaFile) {
        $filePath = public_path($deleteMediaFile->file);

        if (file_exists($filePath)) {
            unlink($filePath); 
        }

        $deleteMediaFile->delete();

        return redirect()->route('admin.media')
            ->with('message', 'File deleted successfully');
    } else {
        return redirect()->route('admin.media')
            ->with('error', 'Data not found!');
    }
}

public function deleteSelectedMedia(Request $request)
{
    if (!$request->has('selectedFiles')) {
        return redirect()->route('admin.media')->with('error', 'No files selected for deletion.');
    }

    $selectedFiles = $request->input('selectedFiles');

    foreach ($selectedFiles as $fileId) {
        $deleteMediaFile = MediaFile::find($fileId);

        if ($deleteMediaFile) {
            $filePath = public_path($deleteMediaFile->file);

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $deleteMediaFile->delete();
        }
    }

    return redirect()->route('admin.media')->with('message', 'Selected files deleted successfully!');
}


}