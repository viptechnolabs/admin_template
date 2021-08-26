<?php

namespace App\Http\Controllers;

use App\DataTables\SchoolDataTable;
use App\Models\Certificate;
use App\Models\College;
use App\Models\School;
use App\Models\Student;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;

class IndexConroller extends Controller
{
    //

    public function login()
    {
        //return view('login');
        if (Auth::check()) {
            return redirect()->route('index');
        }
        $users = User::with('university')->where('user_type', 'admin')->orWhere('user_type', 'university')->get();
        return view('login', ['users' => $users]);
    }

    public function doLogin(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if ($user->user_type === 'admin') {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'admin'], $request->filled('remember'))) {
                Session::put('userType', 'admin');
                activity('Login')
                    ->performedOn(Auth::user())
                    ->causedBy(Auth::user())
                    ->log(Auth::user()->name . ' Admin login');
                return redirect()->route('index');
            }
            //Authentication failed...
            session()->flash('message', 'Login failed, please try again!');
            return redirect()
                ->back();
        } elseif ($user->user_type === 'university') {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'university'], $request->filled('remember'))) {
                Session::put('userType', 'university');
                activity('Login')
                    ->performedOn(Auth::user())
                    ->causedBy(Auth::user())
                    ->log(Auth::user()->name . 'University login');
                return redirect()->route('index');
            }
            //Authentication failed...
            session()->flash('message', 'Login failed, please try again!');
            return redirect()
                ->back();
        }
        //Authentication failed...
        session()->flash('message', 'Login failed, please try again!');
        return redirect()
            ->back();
    }

    public function logout()
    {
        if (Session::get('userType') === 'admin') {
            activity('Logout')
                ->performedOn(Auth::user())
                ->causedBy(Auth::user())
                ->log(Auth::user()->name . 'Admin Logout');
        } elseif (Session::get('userType') === 'university') {
            activity('Logout')
                ->performedOn(Auth::user())
                ->causedBy(Auth::user())
                ->log(Auth::user()->name . 'University Logout');
        }
        Session::flush();
        Auth::logout();
        return redirect()
            ->route('login')
            ->with('message', 'Logout successfully...!');
    }

    public function activity()
    {
        $activities = Activity::orderBy('id', 'DESC')->get(); //returns the last logged activity
        return view('activity', ['activities' => $activities]);
    }

    public function profile()
    {
        $profile = Auth::user();
        return view('profile', ['profile' => $profile]);
    }

    public function index()
    {
        if (Session::get('userType') === 'admin') {
            $university_count = University::all()->count() - 1;
            $college_count = College::all()->count();
            $school_count = School::all()->count();
            $student_count = Student::all()->count();
            $certificate_count = Certificate::all()->count();
        } elseif (Session::get('userType') === 'university') {
            $university_count = University::where('id', Auth::user()->id)->count();
            $college_count = College::where('uni_id', Auth::user()->university->id)->count();
            $school_count = School::all()->count();
            $student_count = Student::whereHas('college', function ($query) {
                $query->where('uni_id', Auth::user()->university->id);
            })->count();
            $certificate_count = Certificate::all()->count();
        }
        return view('index', ['university_count' => $university_count,
            'college_count' => $college_count,
            'school_count' => $school_count,
            'certificate_count' => $certificate_count,
            'student_count' => $student_count
        ]);
    }


    public function addUniversity()
    {
        return view('add_university');
    }

    public function University()
    {
        //$universities = University::with('user')->get();
        $universities = User::with('university')->where('user_type', 'university')->get();
        return view('university', ['universities' => $universities]);
    }

    public function SubmitUniversity(Request $request)
    {
        $rules = array(
            'university_name' => 'required',
            'university_code' => 'required|max:10|min:3',
            'university_contact' => 'required|max:13|min:7',
            'university_email' => 'required|max:50|min:7',
            'university_address' => 'required',
        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        } else {

            $user = new User();
            $user->user_type = "university";
            $user->email = $request->university_email;
            $user->password = Hash::make('password');
            $user->save();

            $university = new University();
            $university->user_id = $user->id;
            $university->name = $request->university_name;
            $university->code = $request->university_code;
            $university->contact_no = $request->university_contact;
            $university->address = $request->university_address;
            $university->save();
            activity('Add university')
                ->performedOn($university)
                ->log($request->university_name . ' university are added');
            session()->flash('message', 'University Add Successfully..!');
            return redirect()->route('university');

        }
    }

    public function addCollege()
    {
        $universities = User::with('university')->where('user_type', 'university')->get();
        //dd($universities[0]->university->id);
        return view('add_college', ['universities' => $universities]);
    }

    public function College()
    {
        if (Session::get('userType') === 'admin') {
            $colleges = College::with('user')->get();
        } elseif (Session::get('userType') === 'university') {
            $colleges = College::where('uni_id', Auth::user()->university->id)->get();
        }
        return view('college', ['colleges' => $colleges]);
    }

    public function submitCollage(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rules = array(
            'college_name' => 'required',
            'college_code' => 'required|max:10|min:3',
            'college_contact' => 'required|max:13|min:7',
            'college_email' => 'required|max:50|min:7',
            'college_address' => 'required',
        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        } else {

            $user = new User();
            $user->user_type = "college";
            $user->email = $request->college_email;
            $user->password = Hash::make('password');
            $user->save();


            $college = new College();
            $college->user_id = $user->id;
            $college->uni_id = Session::get('userType') === 'admin' ? $request->uni : Auth::user()->university->id;
            $college->name = $request->college_name;
            $college->code = $request->college_code;
            $college->contact_no = $request->college_contact;
            $college->address = $request->college_address;
            $college->save();

            activity('Add college')
                ->performedOn($college)
                ->log($request->college_name . ' college are added');

            session()->flash('message', 'College Add Successfully..!');
            return redirect()->route('college');

        }
    }


    public function addSchool()
    {
        return view('add_school');
    }

    public function SubmitSchool(Request $request)
    {
        $rules = array(
            'school_name' => 'required',
            'school_code' => 'required|max:10|min:3',
            'school_contact' => 'required|max:13|min:7',
            'school_email' => 'required|max:50|min:7',
            'school_address' => 'required',
        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        } else {

            $user = new User();
            $user->user_type = "school";
            $user->email = $request->school_email;
            $user->password = Hash::make('password');
            $user->save();


            $school = new School();
            $school->user_id = $user->id;
            $school->name = $request->school_name;
            $school->code = $request->school_code;
            $school->contact_no = $request->school_contact;
            $school->address = $request->school_address;
            $school->save();

            activity('Add school')
                ->performedOn($school)
                ->log($request->school_name . 'school are added');

            session()->flash('message', 'School Add Successfully..!');
            return redirect()->route('school');

        }
    }

    public function School()
    {
        $schools = School::with('user')->get();
        return view('school', ['schools' => $schools]);
        //return view('school');
    }

    public function addStudent()
    {
        if (Session::get('userType') === 'admin') {
            $colleges = College::all();
        } elseif (Session::get('userType') === 'university') {
            $colleges = College::where('uni_id', Auth::user()->university->id)->get();
        }
        return view('add_student', ['colleges' => $colleges]);
    }

    public function SubmitStudent(Request $request)
    {
        $rules = array(
            'student_name' => 'required',
            'student_stream' => 'required',
            'student_dob' => 'required',
            'gender' => 'required',
            'student_clg' => 'required',
            'student_contact' => 'required|max:13|min:7',
            'student_email' => 'required|max:50|min:7',
            'student_address' => 'required',
        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        } else {
            $student = new Student();
            $enrollment_no_find = Student::orderBy('enrollment_no', 'DESC')->first();
            $enrollment_no = substr($enrollment_no_find->enrollment_no ?? '2021/08/0001', -1) + 1;
            $student->clg_id = $request->student_clg;
            $student->enrollment_no = '2021/08/000' . $enrollment_no;
            $student->name = $request->student_name;
            $student->stream = $request->student_stream;
            $student->dob = $request->student_dob;
            $student->email = $request->student_email;
            $student->contact_no = $request->student_contact;
            $student->gender = $request->gender;
            $student->address = $request->student_address;
            $student->save();

            activity('Add student')
                ->performedOn($student)
                ->log($request->student_name . 'student are added');

            session()->flash('message', 'Student Add Successfully..!');
            return redirect()->route('student');
        }
    }

    public function Student()
    {
        if (Session::get('userType') === 'admin') {
            $students = Student::with('college')->get();
        } elseif (Session::get('userType') === 'university') {
            $students = Student::whereHas('college', function ($query) {
                $query->where('uni_id', Auth::user()->university->id);
            })
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('student', ['students' => $students]);
    }

    public function addCertificate()
    {
        $students = Student::whereHas('college', function ($query) {
            $query->where('uni_id', Auth::user()->university->id);
        })
            ->orderBy('id', 'desc')
            ->get();
        $colleges = College::where('uni_id', Auth::user()->university->id)->get();
        return view('add_certificate', ['students' => $students, 'colleges' => $colleges]);
    }

    public function submitCertificate(Request $request)
    {
        $rules = array(
            'student' => 'required',
            'student_clg' => 'required',
            'certificate_name' => 'required|max:50',
            'issue_dob' => 'required',
            'student_stream' => 'required',
            'language' => 'required',
            'passing_year' => 'required',
            'grade' => 'required',
        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        } else {
            $certificate = new Certificate();
            $certificate_no_find = Certificate::orderBy('certificate_no', 'DESC')->first();
            $certificate_no = substr($certificate_no_find->certificate_no ?? '/0', -1) + 1;
            $certificate->clg_id = $request->student_clg;
            $certificate->student_id = $request->student;
            $certificate->certificate_no = 'CR/' . strtoupper($request->student_stream) . '/' . $certificate_no;
            $certificate->name = $request->certificate_name;
            $certificate->issue_dob = $request->issue_dob;
            $certificate->stream = $request->student_stream;
            $certificate->language = $request->language;
            $certificate->passing_year = $request->passing_year;
            $certificate->grade = $request->grade;
            $certificate->save();

            activity('Add certificate')
                ->performedOn($certificate)
                ->log($request->certificate_name . 'certificate are added');

            session()->flash('message', 'Certificate Add Successfully..!');
            return redirect()->route('certificate');
        }
    }

    public function Certificate()
    {
        if (Session::get('userType') === 'admin') {
            $certificates = Certificate::with('student')
                ->orderBy('id', 'desc')
                ->get();
        } elseif (Session::get('userType') === 'university') {
            $certificates = Certificate::whereHas('college', function ($query) {
                $query->where('uni_id', Auth::user()->university->id);
            })
                ->with('student')
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('certificate', ['certificates' => $certificates]);
    }

    public function certificateClaim($id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->status = '1';
        $certificate->save();
        session()->flash('message', 'Certificate mark claim successfully..!');
        return redirect()->back();
    }


}
