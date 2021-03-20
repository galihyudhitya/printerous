<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_Organization;

class OrganizationController extends Controller
{
    public function index() {
    	$organization = DB::table('organization')->orderBy('name', 'asc')->paginate(6);
        // $organization = M_Organization::orderBy('name', 'asc')->paginate(4)->get();
        
    	return view('organizationlist',['organization' => $organization]);
 
    }

    public function search(Request $request) {
		$search = $request->search;
		$organization = DB::table('organization')
		->where('name','like',"%".$search."%")
		->paginate();
 
		return view('organizationlist',['organization' => $organization]);
 
	}

    public function add_organization() {
        $person = DB::table('user')->where('auth', 'am')->get();
        return view('addorganization', ['person' => $person]);    
    }

    public function store(Request $request) {
        $file = $request->file('logo');
        $file->getClientOriginalName();
        $file->getClientOriginalExtension();
        $file->getRealPath();
        $file->getSize();
        $file->getMimeType();

        $new_filename = $request->name."_logo.".$file->getClientOriginalExtension();
        $path = "data_logo/".$new_filename;

        $location = 'data_logo';
	    $file->move($location,$new_filename);

        DB::table('organization')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $path,
            'accountmanager_id' => $request->am
        ]);
        return redirect('/organization');
 
    }

    public function edit_organization($id) {
        $organization = DB::table('organization')->where('id',$id)->get();
        return view('editorganization',['organization' => $organization]);
    
    }

    public function update(Request $request) {
        $file = $request->file('logo');
        $new_filename = $request->name."_logo.".$file->getClientOriginalExtension();
        $path = "data_logo/".$new_filename;

        $location = 'data_logo';
	    $file->move($location,$new_filename);
        DB::table('organization')->where('id',$request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $path
        ]);
        return redirect('/organization');
 
    }

    public function delete_organization($id) {
        DB::table('organization')->where('id',$id)->delete();
            
        return redirect('/organization');
    }
    

}