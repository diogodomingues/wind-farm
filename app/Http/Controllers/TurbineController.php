<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\TurbineService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TurbineController extends BaseController
{
    private TurbineService $turbineService;

    public function __construct(TurbineService $turbineService)
    {
        $this->turbineService = $turbineService;
    }

    /**
     * List of all Turbines
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'per_page' => 'int',
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->turbineService->show($request->all());

        return view('turbine.show', ['result' => $result]);
    }

    /**
     * List all details of a Turbine
     */
    public function edit(Request $request, $id)
    {   
        $result = $this->turbineService->edit($id);

        return view('turbine.edit', ['result' => $result]);
    }

    /**
     * Create new Turbine 
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'string',
            'size' => 'integer|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->turbineService->create($request->all());

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return redirect()->route('turbine.get');
    }

    /**
     * Update Turbine details
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'string',
            'size' => 'integer|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->turbineService->update($id, $request->all());

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return redirect()->route('turbine.get');
    }

    /**
     * Delete turbine
     */
    public function delete(Request $request, $id)
    {        
        $result = $this->turbineService->delete($id);

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return redirect()->route('turbine.get');
    }
}
