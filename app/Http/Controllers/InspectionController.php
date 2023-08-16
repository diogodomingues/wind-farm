<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\InspectionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class InspectionController extends BaseController
{
    private InspectionService $inspectionService;

    public function __construct(InspectionService $inspectionService)
    {
        $this->inspectionService = $inspectionService;
    }

    /**
     * List of all Inspections
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'per_page' => 'int',
            'page' => 'int',
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->inspectionService->show($request->all());

        return view('turbine.inspections.show', $result);
    }

    /**
     * Create new Inspection 
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'string',
            'size' => 'integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->inspectionService->create($request->all());

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return view('turbine.inspections.show', $this->inspectionService->show([]));
    }

    /**
     * Update Inspection details
     */
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'string',
            'size' => 'integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->inspectionService->edit($id, $request->all());

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return view('turbine.inspections.show', $this->inspectionService->show([]));
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

        return view('turbine.inspections.show', $this->inspectionService->show([]));
    }
}
