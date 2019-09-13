<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\FeeType;

class FeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $feetypes = FeeType::all();
        // // get query parameter for filter the fetch
        // $employee_id = $request->query->get('employee_id', 0);
        $attendance_date = $request->query->get('attendance_date', date('d/m/Y'));
        $employee_id = null;

        $employees = Employee::where('status', '1')
            ->pluck('name', 'id');
        // dd($employees);
        return view('backend.account.feetype.list', compact('employees', 'employee_id', 'attendance_date', 'feetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.account.feetype.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'amount' => 'required'
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $feetype = new FeeType();
        $feetype->name = $request->input('name');
        $feetype->amount = $request->input('amount');
        $feetype->save();
        return redirect()->route('feetype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feetype = FeeType::where('id', $id)->first();
        return view('backend.account.feetype.edit', compact('feetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'amount' => 'required'
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $feetype = FeeType::where('id', $id)->first();
        $feetype->name = $request->input('name');
        $feetype->amount = $request->input('amount');
        $feetype->save();
        return redirect()->route('feetype.index', compact('feetype'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feetype = FeeType::where('id', $id)->first();
        $feetype->delete();
        return redirect()->route('feetype.index');
    }
}