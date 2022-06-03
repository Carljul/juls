<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use DB;
use Exception;

use App\Models\User;
use App\Models\Admin\Employees;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::with(['user' => function($query){
            return $query->with('person');
        }])->get();

        $users = User::whereNotIn('id', $employees->pluck('user')->pluck('id')->toArray())
            ->with('person')->get();

        return view('admin.employees.index', compact('users', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Http\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $params = $request->all();

        DB::beginTransaction();

        try {
            $employees = Employees::all()->count();

            Employees::create([
                'user_id'     => $params['user_id'],
                'employee_no' => date('y').'-'.($employees+1),
                'shift'       => $params['shift']
            ]);

            DB::commit();

            return redirect()->back()->withErrors(['errors' => false, 'message' => 'Success']);
        } catch(Exception $e) {
            \Log::error($e);

            DB::rollback();

            return redirect()->back()->withErrors(['errors' => true, 'message' => 'Something went wrong']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        return view('admin.employees.update', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees)
    {
        $params = $request->all();

        DB::beginTransaction();
        try {
            $employees->shift         = $params['shift'];
            $employees->sss_no        = $params['sss_no'];
            $employees->tin_no        = $params['tin_no'];
            $employees->philhealth_no = $params['philhealth_no'];
            $employees->pagibig_no    = $params['pagibig_no'];
            $employees->save();

            DB::commit();
            return redirect()->back()->withErrors(['error' => false, 'message' => 'Saved']);
        } catch(Exception $e) {
            \Log::error($e);
            DB::rollback();
            return redirect()->back()->withErrors(['error' => true, 'message' => 'Something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees)
    {
        //
    }
}
