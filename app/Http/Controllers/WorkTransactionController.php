<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\User;
use App\Models\Site;
use App\Models\Task;
use App\Models\WorkTransaction;
use Yajra\DataTables\Facades\DataTables;

class WorkTransactionController extends Controller
{

    public function index()
    {
        $machines = Machine::all();
        $submitted_by = User::all();
        $sites = Site::all();
        $tasks = Task::all();
        return view('work-transaction.index', compact('machines', 'submitted_by', 'sites', 'tasks'));
    }

    public function fetch(Request $request)
    {
        $query = WorkTransaction::with('machine', 'site', 'task', 'uom', 'block', 'activity', 'submitted_by', 'check_by', 'verified_by');

        if ($request->has('machine_id') && $request->machine_id != '') {
            $query->where('machine_id', $request->machine_id);
        }
        if ($request->has('site_id') && $request->site_id != '') {
            $query->where('site_id', $request->site_id);
        }

        if ($request->has('month') && $request->month != '') {
            $query->whereMonth('work_transactions.created_at', $request->month);
        }

        if ($request->has('submitted_by') && $request->submitted_by != '') {
            $query->where('submitted_by', $request->submitted_by);
        }

        if ($request->has('task_id') && $request->task_id != '') {
            $query->where('task_id', $request->task_id);
        }

        if ($request->has('activity_id') && $request->activity_id != '') {
            $query->where('activity_id', $request->activity_id);
        }

        return DataTables::of($query)
                ->addColumn('created_at', function($row) {
                    return $row->created_at ? $row->created_at->format('d-m-Y') : '';
                })  
                ->make(true);
    }
}
