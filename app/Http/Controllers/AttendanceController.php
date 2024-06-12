<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Repository\AttendanceRepositoryInterface;
class AttendanceController extends Controller
{
    protected $Attendance;

    public function __construct(AttendanceRepositoryInterface $Attendance)
    {
        $this->Attendance = $Attendance;
    }
    public function index()
    {
        return $this->Attendance->index();
    }

 
    public function store(Request $request)
    {
        return $this->Attendance->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Attendance->show($id);
    }

}
