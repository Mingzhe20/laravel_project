<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Job;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class AdminController extends Controller
{
    //For job CRUD

    
    public function ShowJob()
    {
        $jobs = Job::all();
        return view('job', ['jobs' => $jobs]);
    }

    public function ShowSelectJob($job_id)
    {
        try{
            $job = Job::findOrFail($job_id);
        }catch(Exception $exception){
            return view('errors.notfound',['error'=>$exception->getMessage()]);
        }
        
        return $job;
    }

    public function CreateJob(Request $request)
    {
        $request->validate([
            'admin_id' => 'required',
            'job_title' => 'required|max:255',
            'job_department' => 'required|max:255',
            'job_desc' => 'required',
            'job_requirement' => 'required',
            'job_type' => 'required|max:255',
            'job_location' => 'required|max:255',
            'salary' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        
        $job =Job::create($request->all());
        return redirect('job');
    }

    public function UpdateJob(Request $request, $job_id)
    {
        try{
            $job = Job::findOrFail($job_id);
        }catch(Exception $exception){
            return view('errors.notfound',['error'=>$exception->getMessage()]);
        }
        $job->update($request->all());
        return $job;
    }

    public function DeleteJob($job_id)
    {
        try{
            $job = Job::findOrFail($job_id);
        }catch(Exception $exception){
            return view('errors.notfound',['error'=>$exception->getMessage()]);
        }
        return $job;
    }
}
