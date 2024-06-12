<?php

namespace App\Http\Controllers;

use App\Models\Graduated;
use Illuminate\Http\Request;
use App\Repository\StudentGraduatedRepositoryInterface;
class GraduatedController extends Controller
{
   
    protected $Graduated;

    public function __construct(StudentGraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }

    public function index()
    {
        return $this->Graduated->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Graduated->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Graduated->SoftDelete($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Graduated $graduated)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Graduated $graduated)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Graduated $graduated)
    {
        return $this->Graduated->ReturnData($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Graduated->destroy($request);
    }
}
