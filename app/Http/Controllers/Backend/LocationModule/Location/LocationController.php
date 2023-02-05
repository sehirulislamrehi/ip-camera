<?php

namespace App\Http\Controllers\Backend\LocationModule\Location;

use App\Http\Controllers\Controller;
use App\Models\LocationModule\Location;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LocationController extends Controller
{

    public $types = [
        [
            'id' => 1,
            'name' => 'Location',
            'value' => 'L',
        ],
        [
            'id' => 2,
            'name' => 'Business Unit',
            'value' => 'BU',
        ],
    ];

    //index funciton start
    public function index(){
        try{
            if( can("all_location")){
                return view("backend.modules.location_module.location.index");
            }
            else{
                return view("errors.403");
            }
        }
        catch( Exception $e ){
            return back()->with('error', $e->getMessage());
        }
    }
    //index funciton end


    //data function start
    public function data(){
        try{
            if( can('all_location') ){

                $location = Location::orderBy("id","desc")->select("id","name","type","is_active")->get();
    
                return DataTables::of($location)
                ->rawColumns(['action', 'is_active'])
                ->editColumn('is_active', function (Location $location) {
                    if ($location->is_active == true) {
                        return '<p class="badge badge-success">Active</p>';
                    } else {
                        return '<p class="badge badge-danger">Inactive</p>';
                    }
                })
                ->addColumn('action', function (Location $location) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown'.$location->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown'.$location->id.'">
    
                            '.( can("edit_location") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('location.edit.modal',encrypt($location->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            ': '') .'
    
                        </div>
                    </div>
                    ';
                })
                ->addIndexColumn()
                ->make(true);
            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }
    //data function end


    //add_modal function start
    public function add_modal(){
        try{
            if( can("add_location") ){
                $types = $this->types;
                return view("backend.modules.location_module.location.modals.add", compact('types'));
            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }
    //add_modal function end


    //add function start
    public function add(Request $request){
        try{
            if( can("add_location") ){
                $validator = Validator::make($request->all(),[
                    'type' => 'required',
                    'name' => 'required|unique:locations,name',
                    'is_active' => 'required|in:0,1'
                ]);

                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()], 422);
                }
                else{
                    $location = new Location();

                    $location->name = $request->name;
                    $location->type = $request->type;
                    $location->is_active = $request->is_active;

                    if( $location->save() ){
                        return response()->json(['success' => 'New location created'], 200);
                    }
                }
            }
            else{
                return response()->json(['error' => unauthorized()], 200);
            }
        }
        catch( Exception $e ){
            return response()->json(['error' => $e->getMessage()], 200);
        }
    }
    //add function end


    //edit_modal function start
    public function edit_modal($id){
        try{
            if( can("edit_location") ){
                $location = Location::where("id", decrypt($id))->first();

                if( $location ){
                    $types = $this->types;
                    return view("backend.modules.location_module.location.modals.edit", compact('types','location'));
                }
                else{
                    return "No data found";
                }

            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }
    //edit_modal function end


    //edit function start
    public function edit(Request $request, $id){
        try{
            if( can("edit_location") ){
                $id = decrypt($id);
                $validator = Validator::make($request->all(),[
                    'type' => 'required',
                    'name' => 'required|unique:locations,name,'. $id,
                    'is_active' => 'required|in:0,1'
                ]);

                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()], 422);
                }
                else{
                    $location = Location::where("id", $id)->first();

                    if( $location ){
                        $location->name = $request->name;
                        $location->type = $request->type;
                        $location->is_active = $request->is_active;

                        if( $location->save() ){
                            return response()->json(['success' => 'Data updated'], 200);
                        }
                    }
                    else{
                        return response()->json(['warning' => 'No data found'], 200);
                    }
                    
                }
            }
            else{
                return response()->json(['error' => unauthorized()], 200);
            }
        }
        catch( Exception $e ){
            return response()->json(['error' => $e->getMessage()], 200);
        }
    }
    //edit function end
}
