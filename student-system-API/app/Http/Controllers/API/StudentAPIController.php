<?php
/**
 * Created by PhpStorm.
 * User: MAXIMILIAN
 * Date: 7/27/2018
 * Time: 15:26
 */



namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Student;
use Validator;


class StudentAPIController extends APIBaseController
{
    /**
     * Display all
     */
    public function index()
    {
        $student = Student::all();
        return $this->sendResponse($student->toArray(), ' successful.');
    }


    /**
     * Store
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'f_name'        => 'required',
            'm_name'        => 'required',
            'l_name'        => 'required',
            'dob'           => 'required',
            'id_number'     => 'required',
            'status'        => 'required',
            'email'         => 'required',
            'mobile'        => 'required',
            'address'       => 'required',
            'evening_study' => 'required'

        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $student = Student::create($input);


        return $this->sendResponse($student->toArray(), 'created successfully.');
    }


    /**
     * Display
     */
    public function show($id)
    {
        $student = Student::find($id);


        if (is_null($student)) {
            return $this->sendError(' ops student not found.');
        }


        return $this->sendResponse($student->toArray(), 'successful.');
    }


    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [

            'f_name'        => 'required',
            'm_name'        => 'required',
            'l_name'        => 'required',
            'dob'           => 'required',
            'id_number'     => 'required',
            'status'        => 'required',
            'email'         => 'required',
            'mobile'        => 'required',
            'address'       => 'required',
            'evening_study' => 'required'

        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $student = Student::find($id);
        if (is_null($student)) {
            return $this->sendError('not found!');
        }


        $student->f_name        = $input['f_name'];
        $student->m_name        = $input['m_name'];
        $student->l_name        = $input['l_name'];
        $student->dob           = $input['dob'];
        $student->id_number     = $input['id_number'];
        $student->status        = $input['status'];
        $student->email         = $input['email'];
        $student->mobile        = $input['mobile'];
        $student->address       = $input['address'];
        $student->evening_study = $input['evening_study'];

        $student->save();


        return $this->sendResponse($student->toArray(), 'updated');
    }


    /**
     * Remove
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        if (is_null($student)) {
            return $this->sendError('not found!');
        }


        $student->delete();


        return $this->sendResponse($id, 'deleted successfully.');
    }
}