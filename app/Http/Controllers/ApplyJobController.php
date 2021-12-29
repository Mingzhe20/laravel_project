<?php

namespace App\Http\Controllers;

use App\Events\SendMailEvent;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Intern;
use App\Models\InternDetail;
use App\Models\JobApplication;
use App\Models\Job;
use Exception;

class ApplyJobController extends Controller
{
    public function ApplyForm($job_id){
        try{
            $applying = Job::findOrFail($job_id);
        }catch(Exception $exception){
            return view('errors.notfound',['error'=>$exception->getMessage()]);
        }

        return view('apply');
    }

    public function NewApplication(Request $request,$job_id)
    {
        try{
            $applying = Job::findOrFail($job_id);
        }catch(Exception $exception){
            return view('errors.notfound',['error'=>$exception->getMessage()]);
        }

        /** Validation */
        $request->validate([
            'intern_name' => 'required|max:255',
            'intern_phone' => 'required',
            'intern_email' => 'required|email',
            'time_to_start' => 'required|date',
            'time_to_end' => 'required|date',
            'resume' => 'required|mimes:pdf|max:5120',
            'current_edu_level' => 'required:max:255',
            'current_edu_institution' => 'required:max:255',
            'current_institution_location' => 'required:max:255',
            'study_field' => 'required:max:255',
            'grad_period' => 'required:max:255',
           
        ]);

        /** Store into Intern table  */
        $intern = Intern::create([
            'user_id' => NULL,
            'intern_name' => request('intern_name'),
            'department_id' => NULL, 
            'intern_email' => request('intern_email'),
            'intern_phone' => request('intern_phone'),
        ]);


        /* Notify admin */
        event(new SendMailEvent($intern));


        /* Store resume */
        $ext=$request->file('resume')->getClientOriginalExtension();
        $filename = $intern->intern_id . '-' . $intern->intern_name.'.'.$ext;
        
        $request->file('resume')->storeAs('resume', $filename);


        /** Store into Intern Detail table */
        $detail = InternDetail::create([
            'intern_id' => $intern->intern_id,
            'time_to_start' => request('time_to_start'),
            'time_to_end' => request('time_to_end'),
            'resume' => $filename,
            'text'=>'text',     //Unknown
            'states'=>'states', //Unknown
            'status'=>'status', //Unknown
            'time_to_update'=>date('Y-m-d H-i-s'),
            'time_to_post'=>date('Y-m-d H-i-s'),
        ]);

       /** Store into Education table */
        $education = Education::create([
            'intern_detail_id' => $detail->intern_detail_id,
            'current_edu_level' => request('current_edu_level'),
            'current_edu_institution' => request('current_edu_institution'),
            'current_institution_location' => request('current_institution_location'),
            'study_field' => request('study_field'),
            'grad_period' => request('grad_period'),
        ]);

         /** Store into Job Application table */
        $application = JobApplication::create([
            'job_id'=>$applying->job_id,
            'intern_id' => $intern->intern_id,
            'admin_id'=>$applying->admin_id,
            'apply_date' => date('Y-m-d'),
            'status' => 'New',
        ]);

        
    }
}
