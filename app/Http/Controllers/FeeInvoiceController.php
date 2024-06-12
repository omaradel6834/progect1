<?php

namespace App\Http\Controllers;

use App\Models\fee_invoice;
use Illuminate\Http\Request;
use App\Repository\FeeInvoicesRepositoryInterface;
class FeeInvoiceController extends Controller
{
    protected $Fees_Invoices;
    public function __construct(FeeInvoicesRepositoryInterface $Fees_Invoices)
    {
        $this->Fees_Invoices = $Fees_Invoices;
    }
    public function index()
    {
        return $this->Fees_Invoices->index();
    }

    public function store(Request $request)
    {
        return $this->Fees_Invoices->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Fees_Invoices->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->Fees_Invoices->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fee_invoice $fee_invoice)
    {
        return $this->Fees_Invoices->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Fees_Invoices->destroy($request);
    }
}
