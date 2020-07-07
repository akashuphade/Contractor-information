<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\Contract;
use App\Models\ContractWork;
use App\Models\RoadType;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $status='active')
    {
        switch ($status) {
            case 'active':
                $works = ContractWork::with('contract')->with('roadType')->paginate(5);
                break;

            case 'deleted':
                $works = ContractWork::onlyTrashed()->with('contract')->with('roadType')->paginate(5);
                break;
        }

        return view('works.index')->with(['works' => $works, 'status'=>$status]);
    }

    public function getWorks($contractId, $action)
    {

        switch ($action) {
            case 'all':
                $works = ContractWork::where('contract_id', $contractId)->with('contract')->with('roadType')->paginate(5);
                break;

            case 'expired':
                $works = ContractWork::where('contract_id', $contractId)->where('expiry_date', '<', date('Y-m-d'))->with('contract')->with('roadType')->paginate(5);
                break;
        }

        return view('works.index')->with(['works' => $works, 'status'=>'active']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get contractors
        $contractors = Contract::all();

        // Get road types
        $roadTypes = RoadType::all();

        return view('works.create')->with(['roadTypes' => $roadTypes, 'contractors' => $contractors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
    {
        //Store the work of the contractor
        $works = new ContractWork();

        $works->short_description = $request->input('short_desc');
        $works->long_description = $request->input('long_desc');
        $works->start_date = $request->input('start_date');
        $works->completion_date = $request->input('completion_date');
        $works->penalty_rate = $request->input('penalty_rate');
        $works->addr_1 = $request->input('addr_1');
        $works->addr_2 = $request->input('addr_2');
        $works->city = $request->input('city');
        $works->state = $request->input('state');
        $works->country = $request->input('country');
        $works->road_type_id = $request->input('road_type');
        $works->expiry_date = $request->input('expiry_date');
        $works->contract_id = $request->input('contractor');

        $works->save();

        return redirect('works')->with('success', 'Work added successfully..');

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
        $work = ContractWork::withTrashed()->findOrFail($id);

        // Get contractors
        $contractors = Contract::all();

        // Get road types
        $roadTypes = RoadType::all();

        return view('works.edit')->with(['work' => $work, 'contractors' => $contractors, 'roadTypes'=>$roadTypes]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkRequest $request, $id)
    {
        $works = ContractWork::withTrashed()->findOrFail($id);
        $works->short_description = $request->input('short_desc');
        $works->long_description = $request->input('long_desc');
        $works->start_date = $request->input('start_date');
        $works->completion_date = $request->input('completion_date');
        $works->penalty_rate = $request->input('penalty_rate');
        $works->addr_1 = $request->input('addr_1');
        $works->addr_2 = $request->input('addr_2');
        $works->city = $request->input('city');
        $works->state = $request->input('state');
        $works->country = $request->input('country');
        $works->road_type_id = $request->input('road_type');
        $works->expiry_date = $request->input('expiry_date');
        $works->contract_id = $request->input('contractor');

        $works->save();

        return redirect('works')->with('success', 'Work updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = ContractWork::findOrFail($id);
        $work->delete();

        return redirect('works')->with('success', 'Work deleted successfully..');
    }

    public function restore($id)
    {
        $work = ContractWork::onlyTrashed()->findOrFail($id);
        $work->restore();
        return redirect()->to('works/records/active')->with('success', 'Work restored successfully..');
    }
}
