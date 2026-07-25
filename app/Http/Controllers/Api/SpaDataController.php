<?php

namespace App\Http\Controllers\Api;

use App\Asset;
use App\AssetAssignment;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SpaDataController extends Controller
{
    public function dashboard()
    {
        return response()->json([
            'employees' => Employee::with('assets')->latest()->get(),
            'assets' => Asset::with('employee')->latest()->get(),
            'assignments' => AssetAssignment::with(['asset', 'employee'])->latest()->get(),
            'stats' => [
                'employees' => Employee::count(),
                'assets' => Asset::count(),
                'assigned_assets' => Asset::whereNotNull('employee_id')->count(),
                'available_assets' => Asset::whereNull('employee_id')->count(),
            ],
        ]);
    }

    public function storeEmployee(Request $request)
    {
        $data = $request->validate([
            'emp_id' => 'required|string|max:255|unique:employees,emp_id',
            'emp_name' => 'required|string|max:255',
            'emp_faculty' => 'nullable|string|max:255',
            'emp_dep' => 'nullable|string|max:255',
            'emp_position' => 'nullable|string|max:255',
            'emp_position_code' => 'nullable|string|max:255',
            'emp_phone' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        $employee = Employee::create($data + ['status' => 'active']);

        return response()->json($employee, 201);
    }

    public function storeAsset(Request $request)
    {
        $data = $request->validate([
            'asset_tag' => 'required|string|max:255|unique:assets,asset_tag',
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'serial_number' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'purchase_cost' => 'nullable|numeric|min:0',
            'status' => ['nullable', 'string', Rule::in(['available', 'assigned', 'maintenance', 'retired'])],
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        $asset = DB::transaction(function () use ($data) {
            $employeeId = $data['employee_id'] ?? null;
            $asset = Asset::create($data + ['status' => $employeeId ? 'assigned' : 'available']);

            if ($employeeId) {
                AssetAssignment::create([
                    'asset_id' => $asset->id,
                    'employee_id' => $employeeId,
                    'assigned_at' => now(),
                ]);
            }

            return $asset->load('employee');
        });

        return response()->json($asset, 201);
    }

    public function assignAsset(Request $request, Asset $asset)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'notes' => 'nullable|string',
        ]);

        $asset = DB::transaction(function () use ($asset, $data) {
            AssetAssignment::where('asset_id', $asset->id)->whereNull('returned_at')->update([
                'returned_at' => now(),
            ]);

            $asset->update([
                'employee_id' => $data['employee_id'],
                'status' => 'assigned',
            ]);

            AssetAssignment::create([
                'asset_id' => $asset->id,
                'employee_id' => $data['employee_id'],
                'assigned_at' => now(),
                'notes' => $data['notes'] ?? null,
            ]);

            return $asset->load('employee');
        });

        return response()->json($asset);
    }
}
