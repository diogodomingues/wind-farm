<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\ComponentService;
use App\Services\TurbineService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ComponentController extends BaseController
{
    private ComponentService $componentService;

    private TurbineService $turbineService;

    public function __construct(ComponentService $componentService, TurbineService $turbineService)
    {
        $this->componentService = $componentService;
        $this->turbineService = $turbineService;
    }

    /**
     * List of all Components
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'per_page' => 'int',
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->componentService->show($request->all());

        return view('turbine.components.show', ['result' => $result]);
    }

    /**
     * List all details of a Components
     */
    public function edit(Request $request, $id)
    {
        $result = $this->componentService->edit($id);

        $turbines = $this->turbineService->show([]);

        return view('turbine.components.edit', ['result' => $result, 'turbines' => $turbines]);
    }

    /**
     * Show view to create new Components with required data
     */
    public function new(Request $request)
    {
        $result = $this->turbineService->show([]);

        return view('turbine.components.new', ['result' => $result]);
    }

    /**
     * Create new Component 
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'string|nullable',
            'level_damage' => 'required|integer',
            'turbine_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->componentService->create($request->all());

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return redirect()->route('component.get')->with('success', 'Component created!');
    }

    /**
     * Update Component details
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'string|nullable',
            'level_damage' => 'required|integer',
            'turbine_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $result = $this->componentService->update($id, $request->all());

        if (!$result) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return redirect()->route('component.get')->with('success', 'Component updated!');
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

        return redirect()->route('component.get')->with('success', 'Component deleted!');
    }
}
