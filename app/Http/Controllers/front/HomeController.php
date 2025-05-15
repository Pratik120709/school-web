<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Department;
use App\Models\Program;
use App\Models\TuitionFee;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $locations = DB::table('countries')
        ->leftJoin('universities', 'countries.id', '=', 'universities.country_id')
        ->select(
            'countries.id',
            'countries.country_name',
            'countries.image',
            'countries.flag',
            DB::raw('COUNT(universities.id) as listings_count')
        )
        ->where('countries.status', 'ACTIVE')
        ->groupBy('countries.id', 'countries.country_name', 'countries.image', 'countries.flag')
        ->get();
    
    // Fetch all active states for each country
    $states = DB::table('states')
        ->where('status', 'ACTIVE')
        ->get();
    
        $departments = Department::all();
    
        $programs = Program::join('program_details', 'programs.id', '=', 'program_details.program_id')
            ->join('universities', 'program_details.university_id', '=', 'universities.id')
            ->select('programs.id', 'programs.program_name', DB::raw('COUNT(DISTINCT universities.id) as universities_count'))
            ->groupBy('programs.id', 'programs.program_name')
            ->having('universities_count', '>', 0)
            ->orderByDesc('universities_count')
            ->limit(6)
            ->get();
    
        $universities = DB::table('universities')
            ->leftJoin('countries', 'universities.country_id', '=', 'countries.id') 
            ->leftJoin('states', 'universities.state_id', '=', 'states.id') 
            ->leftJoin('scholarships', 'universities.id', '=', 'scholarships.university_id') // Join with scholarships table
            ->select(
                'universities.*',
                'countries.country_name as country_name', 
                'states.state_name', 
                'universities.phone',
               'scholarships.scholarship_available as scholarships_available'            )
            ->where('is_featured', 1)
            ->where('universities.status', 'ACTIVE')
            ->where('countries.status', 'ACTIVE') // Ensure country is ACTIVE
            ->where(function ($query) {
                $query->where('states.status', 'ACTIVE') // Ensure state is ACTIVE
                    ->orWhereNull('states.status'); // Handle universities without states
            })
            ->limit(6)
            ->get();
    
        return view('welcome', compact('locations', 'departments', 'programs', 'universities','states'));
    }
    
    public function getDepartmentsByProgram($programId)
{

    $departments = Department::where('program_id', $programId)->get();
    
    return response()->json($departments);
}

    

    public function getStatesByCountry(Request $request)
{
    $states = State::whereIn('country_id', $request->countries)->get();


    return response()->json($states);
}
public function getProgramsByCountryState(Request $request)
{
    $programs = Program::leftJoin('program_details', 'programs.id', '=', 'program_details.program_id')
        ->leftJoin('universities', 'program_details.university_id', '=', 'universities.id')
        ->where('universities.country_id', $request->country_id)
        ->where('universities.state_id', $request->state_id)
        ->select('programs.id', 'programs.program_name')
        ->distinct() // Fetch unique programs
        ->get();

    return response()->json($programs);
}
public function getDepartmentsByPrograms(Request $request)
{
    $programIds = $request->program_ids; // Get the array of program IDs

    $departments = Department::leftJoin('program_details', 'departments.id', '=', 'program_details.department_id')
        ->whereIn('program_details.program_id', $programIds)
        ->select('departments.id', 'departments.name')
        ->distinct() // Get unique departments
        ->get();
    return response()->json($departments);
}
public function getTuitionFees(Request $request)
{
    $tuitionFees = TuitionFee::where('university_id', $request->university_id)
        ->select('amount')
        ->get();

    // Check if the tuition fees were found
    if ($tuitionFees->isEmpty()) {
        return response()->json([]);
    }

    return response()->json($tuitionFees);
}

}
