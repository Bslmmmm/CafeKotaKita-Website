<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function reportBookmark()
    {
        return view('admin.report.bookmark');
    }

   
}
