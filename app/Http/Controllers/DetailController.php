<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_Organization;
use App\Models\M_Person;

class DetailController extends Controller
{
    public function index($org_id) {
        // $person = DB::table('person')->where('organization_id',$org_id)->get();
        // $organization = DB::table('organization')->where('id',$org_id)->get();
        $organization = M_Organization::where('id',$org_id)->get();
        $person = M_Person::where('organization_id',$org_id)->get();

    	return view('detailpic', ['person' => $person, 'organization' => $organization]);
    }

    public function add_detail($org_id) {
        // $organization = DB::table('organization')->where('id',$org_id)->get();
        $organization = M_Organization::where('id',$org_id)->get();

        return view('addpic', ['organization' => $organization]);
    }

    public function store(Request $request) {
        $file = $request->file('avatar');
        $file->getClientOriginalName();
        $file->getClientOriginalExtension();
        $file->getRealPath();
        $file->getSize();
        $file->getMimeType();

        $new_filename = $request->name."_avatar.".$file->getClientOriginalExtension();
        $path = "data_avatar/".$new_filename;

        $location = 'data_avatar';
	    $file->move($location,$new_filename);

        DB::table('person')->insert([
            'organization_id' => $request->organization_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'avatar' => $path
        ]);
        return redirect('/detail/'.$request->organization_id);
 
    }

    public function edit_detail($org_id, $pic_id) {
        // $person = DB::table('person')->where('id',$pic_id)->get();
        // $organization = DB::table('organization')->where('id',$org_id)->get();
        $organization = M_Organization::where('id',$org_id)->get();
        $person = M_Person::where('id',$pic_id)->get();

        return view('editpic', ['organization' => $organization, 'person' => $person]); 
    }

    public function update(Request $request) {
        $file = $request->file('avatar');
        $new_filename = $request->name."_avatar.".$file->getClientOriginalExtension();
        $path = "data_avatar/".$new_filename;

        $location = 'data_avatar';
	    $file->move($location,$new_filename);
        // M_Person::where('id',$request->id)
        //     ->update(['name' => $request->name,
        //             'phone' => $request->phone,
        //             'email' => $request->email,
        //             'avatar' => $path]);
        DB::table('person')->where('id',$request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'avatar' => $path
        ]);
        return redirect('/detail/'.$request->organization_id);
 
    }

    public function delete_detail($org_id, $id) {
        // DB::table('person')->where('id',$id)->delete();
        $person = M_Person::where('id',$id)->delete();
            
        return redirect('/detail/'.$org_id);
    }



}
