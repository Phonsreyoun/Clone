<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\SalaryTemplate;

class SalaryTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salarytemps = SalaryTemplate::all();
        return view('backend.account.salary-template.list', compact('salarytemps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.account.salary-template.add');
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
                'type' => 'required'
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $salarytemp = new SalaryTemplate();
        $salarytemp->name = $request->input('name');
        $salarytemp->type = $request->input('type');
        $salarytemp->save();
        return redirect()->route('salary-template.index');
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
        $salarytemp = SalaryTemplate::where('id', $id)->first();
        return view('backend.account.salary-template.edit', compact('salarytemp'));
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

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'type' => 'required'
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $salarytemp = SalaryTemplate::where('id', $id)->first();

        $salarytemp->name = $request->input('name');
        $salarytemp->type = $request->input('type');
        $salarytemp->save();
        // dd($salarytemp);
        return redirect()->route('salary-template.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salarytemp = SalaryTemplate::where('id', $id)->first();
        $salarytemp->delete();
        return redirect()->route('salary-template.index');
    }
}