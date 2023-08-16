<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\ComponentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ComponentController extends BaseController
{
    private ComponentService $componentService;

    public function __construct(ComponentService $componentService)
    {
        $this->componentService = $componentService;
    }

    /**
     * List of all Components
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

        $result = $this->componentService->show($request->all());

        return view('turbine.components.show', $result);
    }

    /**
     * Create new Component 
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

        $result = $this->componentService->create($request->all());

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return view('turbine.components.show', $this->componentService->show([]));
    }

    /**
     * Update Component details
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

        $result = $this->componentService->edit($id, $request->all());

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return view('turbine.components.show', $this->componentService->show([]));
    }

    /**
     * Delete Component
     */
    public function delete(Request $request, $id)
    {
        $result = $this->componentService->delete($id);

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return view('turbine.components.show', $this->componentService->show([]));
    }
}
