<?php

namespace App\Http\Controllers;

use App\Models\ReceiptStudent;
use Illuminate\Http\Request;
use App\Repository\ReceiptStudentsRepositoryInterface;
class ReceiptStudentController extends Controller
{

    protected $Receipt;

    public function __construct(ReceiptStudentsRepositoryInterface $Receipt)
    {
        $this->Receipt = $Receipt;
    }

    public function index()
    {
        return $this->Receipt->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Receipt->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Receipt->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->Receipt->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReceiptStudent $receiptStudent)
    {
        return $this->Receipt->update($request);
    }

    
    public function destroy(Request $request)   
  {
        return $this->Receipt->destroy($request);
    }
}
