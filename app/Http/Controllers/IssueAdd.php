<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Issue;

class IssueAdd extends Controller
{
    function addIssue(Request $req)
    {

        $normaluser = new Issue;
        $normaluser->emp_id = $req->emp_id;
        $normaluser->issue_type = $req->issue_type;
        $normaluser->issue_desc = $req->issue_desc;
        $normaluser->issue_status = "queued";
        $normaluser->save();
        return redirect('normal/' . $req->emp_id);
        // return redirect('normal/'.$req->emp_id);
    }
}
