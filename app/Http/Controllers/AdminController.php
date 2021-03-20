<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {
    public function index(){
        $accountmanager = DB::table('organization')
            ->join('user', 'user.user_id', '=', 'organization.accountmanager_id')
            ->select('organization.id AS org_id', 'organization.name AS org', 'user.user_id AS am_id', 'user.name AS am')    
            ->where('user.auth', 'am')
            ->get();
        $person = DB::table('user')->where('auth', 'am')->get();
        return view("adminpage", ['accountmanager' => $accountmanager, 'person' => $person]);
    }

    public function editam(Request $request) {
        echo $request->org_id;
        echo $request->am;
        DB::table('organization')->where('id',$request->org_id)->update([
            'accountmanager_id' => $request->am
        ]);

        return redirect('/adminpage');
    }
}
