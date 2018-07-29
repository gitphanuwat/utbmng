<?php
namespace App\Http\Controllers\Organize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organize;
//use App\Area;

use App\Http\Requests\OrganizeRequest;

class OrganizeController extends Controller
{
     public function __construct()
     {
       //$this->middleware('organize');
     }

     public function index($title)
     {
       $data = Organize::where('title',$title)->first();
       session(['sess_org' => $data->id]);
       session(['sess_orgname' => $data->name]);

      $idc = session('sess_org');
      $objorg = Organize::find($idc);
      return view('organize.organize',compact('objorg'));
    }

    public function create()
    {

    }

    public function store(OrganizeRequest $request)
    {

    }

    public function show($id)
    {
        //$obj = Area::find($id);
        //dd($obj);
    }

    public function edit($id)
    {

    }

    public function update(OrganizeRequest $request, $id)
    {

    }

    public function updatevision(Request $request, $id)
    {

    }

    public function destroy($id)
    {


    }
}
