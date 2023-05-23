<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    //
    public function DivisionView(){
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.division.view_division', compact('divisions'));
    }

    public function DivisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',
        ], [
            'division_name.required' => 'Input Division Name',
        ]);

        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Shiping Disision Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function DivisionEdit($id){
        $divisions = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('divisions'));
    }

    public function DivisionUpdate(Request $request, $id){
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Shiping Division Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage-division')->with($notification);
    }

    public function DivisionDelete($id){
        ShipDivision::findOrFail($id)->delete();
        $notification = [
         'message' => 'Division Deleted Successfully',
         'alert-type' => 'info'
        ];
       return redirect()->back()->with($notification);
    }

    // Start Shipping District
    public function DistrictView(){
        $division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();
        return view('backend.ship.district.view_district', compact('district', 'division'));
    }
    public function DistrictStore(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ], [
            'division_id.required' => 'Select A Division Name',
            'district_name.required' => 'Input District Name',
        ]);

        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Shiping District Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
    public function DistrictEdit($id){
        $division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district',compact('district', 'division'));
    }
    public function DistrictUpdate(Request $request, $id){
        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('manage-district')->with($notification);
    }
    public function DistrictDelete($id){
        ShipDistrict::findOrFail($id)->delete();
        $notification = [
         'message' => 'District Deleted Successfully',
         'alert-type' => 'info'
        ];
       return redirect()->back()->with($notification);
    }
    // Start Shipping State
    public function StateView(){
        $division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $state = ShipState::with('division', 'district')->orderBy('id', 'ASC')->get();
        return view('backend.ship.state.view_state', compact('division', 'district', 'state'));
    }

    public function StateStore(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ], [
            'division_id.required' => 'Select A Division',
            'district_id.required' => 'Select A District',
            'state_name.required' => 'Input State Address',
        ]);

        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Shiping State Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
    public function StateEdit($id){
        $division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $state = ShipState::findOrFail($id);
        return view('backend.ship.state.edit_state', compact('division', 'district', 'state'));
    }

    public function StateUpdate(Request $request, $id){
        ShipState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'State Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('manage-state')->with($notification);
    }
    public function StateDelete($id){
        ShipState::findOrFail($id)->delete();
        $notification = [
         'message' => 'State Deleted Successfully',
         'alert-type' => 'info'
        ];
       return redirect()->back()->with($notification);
    }

    public function Getdistrict($division_id)
    {
        $district = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($district);
    }
}
