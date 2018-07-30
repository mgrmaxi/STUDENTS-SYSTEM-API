<?php
/**
 * Created by PhpStorm.
 * User: MAXIMILIAN
 * Date: 7/30/2018
 * Time: 19:03
 */
namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Department;
use Validator;


class DepartmentApiController extends APIBaseController
{
    /**
     * Display all
     */
    public function index()
    {
       $department = Department::all();

        return $this->sendResponse($department->toArray(), ' successful.');
    }


    /**
     * Store
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'dep_name' => 'required',

        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $department = Department::create($input);


        return $this->sendResponse($department->toArray(), 'created successfully.');
    }


    /**
     * Display
     */
    public function show($id)
    {
        $department = Department::find($id)->students;


        if (is_null($department)) {
            return $this->sendError(' ops this department is not found.');
        }


        return $this->sendResponse($department->toArray(), 'successful.');
    }


    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'dep_name' => 'required',

        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $department = Department::find($id);
        if (is_null($department)) {
            return $this->sendError('not found!');
        }


        $department->name = $input['dep_name'];

        $department->save();


        return $this->sendResponse($department->toArray(), 'updated');
    }


    /**
     * Remove
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        if (is_null($department)) {
            return $this->sendError('not found!');
        }


        $department->delete();


        return $this->sendResponse($id, 'deleted successfully.');
}
}