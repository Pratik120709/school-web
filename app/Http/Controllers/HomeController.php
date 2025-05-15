<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index() {
        $universityCount = University::where('status', 'ACTIVE')->count();
        $programCount = Program::where('status', 'ACTIVE')->count();
        $departmentCount = Department::where('status', 'ACTIVE')->count();
        $countryCount = Country::where('status', 'ACTIVE')->count();
        $stateCount = State::where('status', 'ACTIVE')->count();
    
        $university = University::where('universities.status', 'ACTIVE')
            ->where('is_featured', 1) 
            ->orderBy('created_at', 'desc')
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
    
        return view('home', compact('university', 'universityCount', 'programCount', 'departmentCount', 'countryCount', 'stateCount'));
    }
    
    }