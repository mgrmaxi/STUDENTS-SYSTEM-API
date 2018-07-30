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
use App\Stage;
use Validator;


class StageApiController extends APIBaseController
{
    /**
     * Display all
     */
    public function index()
    {
       $stage = Stage::all();

        return $this->sendResponse($stage->toArray(), ' successful.');
    }


    /**
     * Store
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'stage_name' => 'required',

        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $stage = Stage::create($input);


        return $this->sendResponse($stage->toArray(), 'created successfully.');
    }


    /**
     * Display
     */
    public function show($id)
    {
        $stage = Stage::find($id)->classrooms;


        if (is_null($stage)) {
            return $this->sendError(' no classroom in this stage or stage not found');
        }


        return $this->sendResponse($stage->toArray(), 'successful.');
    }


    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'stage_name' => 'required',

        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $stage = Stage::find($id);
        if (is_null($stage)) {
            return $this->sendError('not found!');
        }


        $stage->name = $input['stage_name'];

        $stage->save();


        return $this->sendResponse($stage->toArray(), 'updated');
    }


    /**
     * Remove
     */
    public function destroy($id)
    {
        $stage = Stage::find($id);

        if (is_null($stage)) {
            return $this->sendError('not found!');
        }


        $stage->delete();


        return $this->sendResponse($id, 'deleted successfully.');
}
}