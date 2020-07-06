<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractorRequest;
use App\Models\CompanyType;
use App\Models\Contract;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $status='active')
    {
        if ($status == 'active') {
            $contractors = Contract::with('companyType')->paginate(5);
        } else {
            $contractors = Contract::onlyTrashed()->with('companyType')->paginate(5);
        }
        return view('contract.index')->with(['contractors' => $contractors, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get all the company types
        $companyTypes = CompanyType::all();
        return view('contract.create')->with('companyTypes', $companyTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractorRequest $request)
    {
        $contractor = new Contract();
        $contractor->company_name = $request->input('company_name');
        $contractor->company_type_id = $request->input('company_type');
        $contractor->contact_person_name = $request->input('contact_person');
        $contractor->contact_number = $request->input('contact_number');
        $contractor->email = $request->input('email');
        $contractor->save();

        return redirect('contracts')->with('success', 'Contractor information added successfully..');

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
        $contractor = Contract::findOrFail($id);
        $companyTypes = CompanyType::all();
        return view('contract.edit')->with(['contractor'=> $contractor, 'companyTypes'=>$companyTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContractorRequest $request, $id)
    {
        $contractor = Contract::findOrFail($id);

        $contractor->company_name = $request->input('company_name');
        $contractor->company_type_id = $request->input('company_type');
        $contractor->contact_person_name = $request->input('contact_person');
        $contractor->contact_number = $request->input('contact_number');
        $contractor->email = $request->input('email');
        $contractor->save();

        return redirect('contracts')->with('success', 'Contractor information updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contractor = Contract::findOrFail($id);
        $contractor->delete();

        return redirect('contracts')->with('success', 'Contractor deleted successfully');
    }

    public function restore($id)
    {
        $contractor = Contract::onlyTrashed()->findOrFail($id);
        $contractor->restore();
        return redirect()->to('contracts/records/active')->with('success', 'Contractor restored successfully..');
    }
}
