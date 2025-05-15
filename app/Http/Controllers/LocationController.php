<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Program;
use App\Models\Subject;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

 public function country(){

    $country = Country::orderBy('created_at', 'desc')->get();
    return view('Admin.country.country',compact('country'));
 }

public function storeCountry(Request $request)
{
    $validator = Validator::make($request->all(), [
        'country_name' => 'required|unique:countries,country_name',
        'flag' => 'required|image|mimes:jpeg,png,jpg,webp|max:5048',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5048|dimensions:width=306,height=459',
        'status' => 'required|in:ACTIVE,INACTIVE',
    ], [
        'country_name.unique' => 'The Country already exists.',
        'image.dimensions' => 'The image must be 306x459 pixels.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed');
    }

    $data = new Country;
    $data->country_name = $request->input('country_name');
    $data->status = $request->input('status');

    if ($request->hasFile('flag')) {
        $flag = $request->file('flag');
        $flagName = time() . '.' . $flag->getClientOriginalExtension();
        $flag->move(public_path('/assets/images/countries/'), $flagName);
        $data->flag = '/assets/images/countries/' . $flagName;
    }

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/assets/images/countries/'), $imageName);
        $data->image = '/assets/images/countries/' . $imageName;
    }
    $data->save();

    return redirect()->route('admin.country.country')->with('message', 'Country Created Successfully');
}


 public function editCountry($id)
 {
     $country = Country::findOrFail($id);
     return view('Admin.country.edit', compact('country'));
 }

public function updateCountry(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'country_name' => 'required|string|max:255|unique:countries,country_name,' . $id,
        'flag' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5048',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5048|dimensions:width=306,height=459',
        'status' => 'required|in:ACTIVE,INACTIVE',
    ], [
        'country_name.unique' => 'The Country already exists.',
        'image.dimensions' => 'The image must be 306x459 pixels.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed');
    }

    $data = Country::findOrFail($id);
    $data->country_name = $request->input('country_name');
    $data->status = $request->input('status');

    if ($request->hasFile('flag')) {
        if ($data->flag && file_exists(public_path($data->flag))) {
            unlink(public_path($data->flag));
        }

        $flag = $request->file('flag');
        $flagName = time() . '.' . $flag->getClientOriginalExtension();
        $flag->move(public_path('assets/images/countries/'), $flagName);
        $data->flag = 'assets/images/countries/' . $flagName;
    }


    if ($request->hasFile('image')) {
        if ($data->image && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images/countries/'), $imageName);
        $data->image = 'assets/images/countries/' . $imageName;
    }

    $data->save();

    return redirect()->route('admin.country.country')->with('message', 'Country Updated Successfully');
}

 
 public function state(){
        $countries = Country::where('status', 'ACTIVE')->orderBy('country_name', 'asc')->get();
        $states = DB::table('states')
                ->select('states.*', 'countries.country_name')
                ->leftJoin('countries', 'states.country_id', '=', 'countries.id')
                ->orderBy('states.id', 'desc')
                ->get();
    return view('Admin.state.state', compact('countries', 'states'));

 }
 public function storeState(Request $request)
{
    $validator = Validator::make($request->all(), [
        'state_name' => 'required|string|max:255|unique:states,state_name',
        'country_id' => 'required|exists:countries,id',
        'status' => 'required|in:ACTIVE,INACTIVE',
    ], [
        'state_name.unique' => 'The State already exists.', 
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput()->with('error', 'state name exit' );
    }

    State::create([
        'state_name' => $request->input('state_name'),
        'country_id' => $request->input('country_id'),
        'status' => $request->input('status'),
    ]);

    return redirect()->route('admin.state.state')->with('message', 'State Created Successfully');
}
    public function editState(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'state_name' => 'required|string|max:255|unique:states,state_name,' . $id,
            'country_id' => 'required|exists:countries,id',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ], [
            'state_name.unique' => 'The State already exists.', 
        ]);
    
      
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'state name exit' );
        }
    
        $state = State::findOrFail($id); // Use findOrFail to ensure state exists
        $state->state_name = $request->input('state_name');
        $state->country_id = $request->input('country_id');
        $state->status = $request->input('status');
        $state->save();
    
        return redirect()->route('admin.state.state')->with('message', 'State Updated Successfully');
    }
    

    public function programs(){

        $program = Program::orderBy('created_at', 'desc')->get();
        return view('Admin.programs.programs',compact('program'));
    }

    public function storeProgram(Request $request){

        $validator = Validator::make($request->all(), [
            'program_name' => 'required|string|max:255|unique:programs,program_name',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ], [
            'program_name.unique' => 'The Program already exists.', 
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Program name already exits' );
        }

        $data = new Program;
        $data->program_name = $request->input('program_name');
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin.programs.programs')->with('message', 'Programs Created Successfully');
    }
    public function editProgram($id)
    {
        $program = Program::orderBy('created_at', 'desc')->get();
        return view('Admin.programs.programs', compact('program'));
    }

    public function updateProgram(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'program_name' => 'required|string|max:255|unique:programs,program_name,' . $id,
            'status' => 'required|in:ACTIVE,INACTIVE',
            ], [
                'program_name.unique' => 'The Program already exists.', 
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Program name already exits' );
            }

        $data = Program::findOrFail($id);
        $data->program_name = $request->input('program_name');
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin.programs.programs')->with('message', 'Programs Updated Successfully');
    }

    public function subject()
    {
        $programs = Program::where('status', 'ACTIVE')->get();
        $departments = Department::where('status', 'ACTIVE')->get();
        
        $subjects = DB::table('subjects')
        ->select('subjects.*', 'programs.program_name', 'departments.name as department_name')
        ->leftJoin('programs', 'subjects.program_id', '=', 'programs.id')
        ->leftJoin('departments', 'subjects.department_id', '=', 'departments.id')
        ->orderBy('subjects.id', 'desc')
        ->get();
    
    
    
        return view('Admin.subject.subject', compact('programs', 'subjects', 'departments'));
    }
    
    public function storeSubject(Request $request){
        {
            $validator = Validator::make($request->all(), [
                // 'subject_name' => 'required|string|max:255|unique:subjects,subject_name',
                'subject_name' => 'required|string|max:255',
                'program_id' => 'required|exists:programs,id',
                'department_id' => 'required|exists:departments,id',
                'status' => 'required|in:ACTIVE,INACTIVE',
            ], [
                'subject_name.unique' => 'The Subject already exists.', 
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Subject name already exit' );
            }

            Subject::create([
                'subject_name' => $request->input('subject_name'),
                'program_id' => $request->input('program_id'),
                'department_id' => $request->input('department_id'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route('admin.subject.subject')->with('message', 'Subject Created Successfully');
        }
    }
    public function editSubject(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'subject_name' => 'required|string|max:255' . $id,
            'program_id' => 'required|exists:programs,id',
            'department_id' => 'required|exists:departments,id',
            'status' => 'required|in:ACTIVE,INACTIVE',
            ], [
                'subject_name.unique' => 'The Subject already exists.', 
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Subject name already exit' );
            }
    
        $state = Subject::findOrFail($id);
        $state->subject_name = $request->input('subject_name');
        $state->program_id = $request->input('program_id');
        $state->department_id = $request->input('department_id');
        $state->status = $request->input('status');
        $state->save();
    
        return redirect()->route('admin.subject.subject')->with('message', 'Subject Updated Successfully');
    }

    public function Department(){
        $programs = Program::where('status', 'ACTIVE')->get();
        $department = DB::table('departments')
        ->select('departments.*', 'programs.program_name')
        ->leftJoin('programs', 'departments.program_id', '=', 'programs.id')
        ->orderBy('departments.id', 'desc')
        ->get();
        return view('Admin.department.department',compact('department','programs'));
    }
    public function storeDepartment(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('departments', 'name')->where(function ($query) use ($request) {
                    return $query->where('program_id', $request->input('program_id'));
                }),
            ],
            'program_id' => 'required|exists:programs,id',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ], [
            'name.unique' => 'The Department already exists', 
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation Error');
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Department name already exits' );
        }
        $data = new Department;
        $data->name = $request->input('name');
        $data->program_id = $request->input('program_id');
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin.department.department')->with('message', 'Department Created Successfully');
    }
    public function editDepartment($id){
        $department = Department::orderBy('created_at', 'desc')->get();
        return view('Admin.department.department',compact('department'));
    }

    public function updateDepartment(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('departments', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where('program_id', $request->input('program_id'));
                    })
                    ->ignore($id),
            ],
            'program_id' => 'required|exists:programs,id',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ], [
            'name.unique' => 'The Department already exists.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation Error');
        }

        $data = Department::findOrFail($id);
        $data->name = $request->input('name');
        $data->program_id = $request->input('program_id');
        $data->status = $request->input('status');
        $data->save();

    
        return redirect()->route('admin.department.department')->with('message', 'Department Updated Successfully');
    }

    }
    
    