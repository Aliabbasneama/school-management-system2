<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Repository\StudentRepositoryInterface;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }
    
    public function index()
    {
        return $this->Student->Get_student();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Student->Create_Student();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        return $this->Student->Store_Student($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Student->Show_Student($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->Student->Edit_Student($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentsRequest $request)
    {
        return $this->Student->Update_Student($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    }

    public function Get_classrooms($id)
    {
       return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }

    public function Upload_attachment(Request $request)
    {
        return $this->Student->Upload_attachment($request);
    }

    public function Download_attachment($studentsname,$filename)
    {
        return $this->Student->Download_attachment($studentsname,$filename);
    }

    public function Delete_attachment(Request $request)
    {
        return $this->Student->Delete_attachment($request);

    }

}
