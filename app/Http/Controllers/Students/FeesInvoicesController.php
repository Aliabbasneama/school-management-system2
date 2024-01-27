<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\FeeInvoicesRepositoryInterface;

class FeesInvoicesController extends Controller
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
    public function update(Request $request)
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
