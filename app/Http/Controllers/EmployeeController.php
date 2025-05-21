<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function addemp() {
        return view('addemp'); 
    }

    public function save_employee(Request $request) {

        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:6',
            'mobile' => 'required|digits:10',
            'address' => 'required|string|max:255',
        ]);


        $employee = new Employee();
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname; 
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password); 
        $employee->mobile = $request->mobile;
        $employee->address = $request->address;
        $employee->save();

        return redirect()->back()->with('success', 'Employee added successfully');
        
    }
    public function index(){
        $data = Employee::get();
        return view('emplist',compact('data'));
    }
    public function editemp($id){
        $data = Employee::where('id','=',$id)->first();
        return view('editemp',compact('data'));
    }
    public function update_employee(Request $request, $id) {
    $request->validate([
        'firstname' => 'required|string|max:100',
        'lastname' => 'required|string|max:100',
        'email' => 'required|email|unique:employees,email,'.$id,
        'password' => 'nullable|string|min:6',
        'mobile' => 'required|digits:10',
        'address' => 'required|string|max:255',
    ]);

    $employee = Employee::findOrFail($id);
    $employee->firstname = $request->firstname;
    $employee->lastname = $request->lastname;
    $employee->email = $request->email;

    // Update password only if changed
    if ($request->password) {
        $employee->password = bcrypt($request->password);
    }

    $employee->mobile = $request->mobile;
    $employee->address = $request->address;
    $employee->save();

    return redirect('/emplist')->with('success', 'Employee updated successfully.');
}
public function delete_employee($id){
        $data = Employee::where('id','=',$id)->delete();
          return redirect()->back()->with('success', 'Employee deleted successfully');
}

}
