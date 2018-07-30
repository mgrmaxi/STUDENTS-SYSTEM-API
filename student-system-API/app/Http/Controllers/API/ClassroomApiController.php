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
use App\Classroom;
use Validator;


class ClassroomApiController extends APIBaseController
{
    /**
     * Display all
     */
    public function index()
    {
       $classroom = Classroom::all();

        return $this->sendResponse($classroom->toArray(), ' successful.');
    }


    /**
     * Store
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'class_name' => 'required',

        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $classroom = Department::create($input);


        return $this->sendResponse($classroom->toArray(), 'created successfully.');
    }


    /**
     * Display
     */
    public function show($id)
    {
        $classroom = Classroom::find($id)->students;


        if (is_null($classroom)) {
            return $this->sendError(' ops classroom not found.');
        }


        return $this->sendResponse($classroom->toArray(), 'successful.');
    }


    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'class_name' => 'required',

        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $classroom = Classroom::find($id);
        if (is_null($classroom)) {
            return $this->sendError('not found!');
        }


        $classroom->name = $input['class_name'];

        $classroom->save();


        return $this->sendResponse($classroom->toArray(), 'updated');
    }


    /**
     * Remove
     */
    public function destroy($id)
    {
        $classroom = Classroom::find($id);

        if (is_null($classroom)) {
            return $this->sendError('not found!');
        }


        $classroom->delete();


        return $this->sendResponse($id, 'deleted successfully.');
}
}