<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;

class AdminAgencyController extends Controller
{
    //public function to get all agencies
    public function index()
    {
        $agencies = Agency::all();

        return view ('admin.agencies')->with('agencies', $agencies);
    }

    public function create()
    {
        return view('admin.add_agency');
    }

    public function store(Request $request)
    {
        $agency = new Agency;
        $agency->name = $request->name;
        $agency->slug = str_slug($request->name);
        $agency->status = $request->status;

        $logoObject = $request->logo;

        if(!empty($logoObject))
        {
            $logoName = $logoObject->getClientOriginalName();
            $logo = time() . $logoName;

            $destination = 'uploads/agencies/logos/';
            $filePath = $destination . $logo;

            $logoObject->move($destination, $logo);

            $agency->logo = $filePath;
        }
        else {
            $agency->logo = Agency::DEFAULT_LOGO;
        }

        $agency->save();


        session()->flash("success", "Agency Saved");

        return back();
    }

    public function edit($id)
    {
        $agency  = Agency::find($id);

        return view('admin.edit_agency')->with('agency', $agency);
    }

    public function update(Request $request, $id)
    {
        $agency = Agency::find($id);

        $agency->name = $request->name;
        $agency->slug = str_slug($request->name);
        $agency->status = $request->status;

        $logoObject = $request->logo;

        if(!empty($logoObject))
        {
            $logoName = $logoObject->getClientOriginalName();
            $logo = time() . $logoName;

            $destination = 'uploads/agencies/logos/';
            $filePath = $destination . $logo;

            $logoObject->move($destination, $logo);

            $agency->logo = $filePath;
        }
        else {
            //do not change the logo
        }

        $agency->save();

        session()->flash('success', 'Agency Information Updated');

        return redirect()->route('agencies');
    }

    public function view($id)
    {

    }

    public function destroy($id)
    {
        Agency::destroy($id);

        session()->flash('success', 'Agency Deleted');

        return back();
    }

    public function activate($id)
    {
        $agency = Agency::find($id);

        $agency->status = 1;
        $agency->save();

        session()->flash('success', 'Agency Activated');
        return back();
    }

    public function suspend ($id)
    {
        $agency = Agency::find($id);

        $agency->status = -1;
        $agency->save();

        session()->flash('success', 'Agency Suspended');
        return back();
    }
}
