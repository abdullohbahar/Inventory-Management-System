<?php

namespace App\Http\Controllers\Api;

use App\Models\Sallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SallaryController extends Controller
{
    public function paid(Request $request, $id)
    {
        $validateData = $request->validate([
            'sallary_month' => 'required',
        ]);

        $month = $request->sallary_month;

        $check = DB::table('sallaries')->where('employee_id', $id)->where('sallary_month', $month)
            ->first();

        if ($check) {
            return response()->json('Sallary Already Paid');
        } else {
            $data = [
                'employee_id' => $id,
                'amount' => $request->sallary,
                'sallary_date' => date('d/m/Y'),
                'sallary_month' => $month,
                'sallary_year' => date('Y'),
            ];

            Sallary::create($data);
        }
    }

    public function allSallary()
    {
        $sallary = DB::table('sallaries')->select('sallary_month')->groupBy('sallary_month')->get();
        return response()->json($sallary);
    }

    public function viewSallary($id)
    {
        $view = DB::table('sallaries')
            ->join('employees', 'sallaries.employee_id', 'employees.id')
            ->select('employees.name', 'sallaries.*')
            ->where('sallaries.sallary_month', $id)
            ->get();

        return response()->json($view);
    }

    public  function editSallary($id)
    {
        $edit = DB::table('sallaries')
            ->join('employees', 'sallaries.employee_id', 'employees.id')
            ->select('employees.name', 'employees.email', 'sallaries.*')
            ->where('sallaries.id', $id)
            ->first();

        return response()->json($edit);
    }

    public function updateSallary(Request $request, $id)
    {
        $data = [
            'employee_id' => $request->employee_id,
            'sallary_month' => $request->sallary_month,
            'amount' => $request->amount,
        ];

        Sallary::where('id', $id)->update($data);
    }
}
