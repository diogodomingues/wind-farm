<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\InspectionService;
use App\Services\TurbineService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class InspectionController extends BaseController
{
    private InspectionService $inspectionService;

    private TurbineService $turbineService;

    public function __construct(InspectionService $inspectionService, TurbineService $turbineService)
    {
        $this->inspectionService = $inspectionService;
        $this->turbineService = $turbineService;
    }

    /**
     * List of all Inspections
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'per_page' => 'int',
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->inspectionService->show($request->all());

        return view('turbine.inspections.show', ['result' => $result]);
    }

    /**
     * List all details of a Inspections
     */
    public function edit(Request $request, $id)
    {
        $result = $this->inspectionService->edit($id);

        $turbines = $this->turbineService->show([]);

        return view('turbine.inspections.edit', ['result' => $result, 'turbines' => $turbines]);
    }

    /**
     * Show view to create new Inspections with required data
     */
    public function new(Request $request)
    {
        $result = $this->turbineService->show([]);

        return view('turbine.inspections.new', ['result' => $result]);
    }

    /**
     * Create new Inspection 
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'turbine_id' => 'integer|required',
            'description' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->inspectionService->create($request->all(), Auth::user()->id);

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return redirect()->route('inspection.get');
    }

    /**
     * Update Inspection details
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'turbine_id' => 'integer|required',
            'description' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->inspectionService->update($id, $request->all());

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return redirect()->route('inspection.get');
    }

    /**
     * Delete Inspections
     */
    public function delete(Request $request, $id)
    {
        $result = $this->inspectionService->delete($id);

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return redirect()->route('inspection.get');
    }
}
