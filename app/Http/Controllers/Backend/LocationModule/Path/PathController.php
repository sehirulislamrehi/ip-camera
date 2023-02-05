<?php

namespace App\Http\Controllers\Backend\LocationModule\Path;

use App\Http\Controllers\Controller;
use App\Models\LocationModule\Location;
use App\Models\LocationModule\Path;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PathController extends Controller
{
    //index funciton start
    public function index()
    {
        try {
            if (can("all_path")) {

                $a = 'a:3:{s:3:"set";s:3:"all";s:9:"set_value";s:1:"1";s:10:"conditions";a:2:{i:1;a:3:{s:8:"operator";s:3:"gte";s:9:"condition";s:11:"buyXgetfree";s:5:"value";i:2;}i:2;a:3:{s:8:"operator";s:2:"in";s:9:"condition";s:8:"products";s:5:"value";a:1:{i:1659481411;a:3:{s:3:"aoc";s:1:"N";s:10:"product_id";s:5:"85594";s:6:"amount";s:1:"2";}}}}}';

                return unserialize($a);
                return view("backend.modules.location_module.path.index");
            } else {
                return view("errors.403");
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    //index funciton end


    //data function start
    public function data()
    {
        try {
            if (can('all_path')) {

                $path = Path::orderBy("id", "desc")->select("id", "path", "is_active")->get();

                return DataTables::of($path)
                    ->rawColumns(['action', 'is_active'])
                    ->editColumn('is_active', function (Path $path) {
                        if ($path->is_active == true) {
                            return '<p class="badge badge-success">Active</p>';
                        } else {
                            return '<p class="badge badge-danger">Inactive</p>';
                        }
                    })
                    ->addColumn('action', function (Path $path) {
                        return '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown' . $path->id . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown' . $path->id . '">
    
                            ' . (can("edit_location") ? '
                            <a class="dropdown-item" href="#" data-content="' . route('location.edit.modal', encrypt($path->id)) . '" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            ' : '') . '
    
                        </div>
                    </div>
                    ';
                    })
                    ->addIndexColumn()
                    ->make(true);
            } else {
                return unauthorized();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //data function end


    //add_modal function start
    public function add_modal()
    {
        try {
            if (can("add_path")) {
                $locations = Location::where("is_active", true)->select("id","name","type")->get();

                return view("backend.modules.location_module.pah.modals.add", compact('locations'));
            } else {
                return unauthorized();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //add_modal function end
}
