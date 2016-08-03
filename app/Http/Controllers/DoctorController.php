<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Illuminate\Support\Facades\Input;

class DoctorController extends Controller
{
    public function getIndex ()
    {
        return view('admin.doctor');
    }

    public function save(Request $request)
    {
    	$this->validate($request , [
    		'name' 		=> 'required|max:200',
    		'degree'	=> 'required|max:100',
    		'gender' 	=> 'required',
    		'birthDate'	=> 'required',
    		'charge'	=> 'required|numeric',
    		'mobile'	=> 'required|numeric',
    		'email'		=> 'required|email'
    	]);

    	$doctor 		   = new Doctor();
    	$doctor->name 	   = ucfirst($request['name']);
    	$doctor->degree    = $request['degree'];
    	$doctor->gender	   = $request['gender'];
    	$doctor->birthDate = $request['birthDate'];
    	$doctor->charge	   = $request['charge'];
    	$doctor->mobile	   = $request['mobile'];
    	$doctor->email	   = $request['email'];    	
    	$doctor->hAddress  = $request['hAddress'];
    	$doctor->oaddress  = $request['oAddress'];
    	$doctor->specialist = $request['specialist'];
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $file->move(public_path(). '/',$file->getClientOriginalName());

            $doctor->image = $file->getClientOriginalName();
            $doctor->size = $file->getClientsize();
            $doctor->type = $file->getClientMimeType();
        }
    	$doctor->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function viewList()
    {
        $doctor = Doctor::all();
        return view('admin.doctor_list' , ['doctors' => $doctor]);
    }
}
