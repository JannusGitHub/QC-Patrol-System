<?php

namespace App\Exports;

use App\AuditResult;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AuditResultsExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    
    
    protected $data;
    protected $factor_item_list;
    protected $factor_item_list_machine;
    protected $factor_item_list_method;
    protected $factor_item_list_material;
    protected $factor_item_list_non_forming;
    
    function __construct($data, $factor_item_list, $factor_item_list_machine, $factor_item_list_method, $factor_item_list_material, $factor_item_list_non_forming)
    {
        $this->data = $data;
        $this->factor_item_list = $factor_item_list;
        $this->factor_item_list_machine = $factor_item_list_machine;
        $this->factor_item_list_method = $factor_item_list_method;
        $this->factor_item_list_material = $factor_item_list_material;
        $this->factor_item_list_non_forming = $factor_item_list_non_forming;
        
    }

    //for multiple sheets
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new AuditResultExport($this->data);
        $sheets[] = new LPAMan($this->data, $this->factor_item_list);
        $sheets[] = new LPAMachine($this->data, $this->factor_item_list_machine);
        $sheets[] = new LPAMethod($this->data, $this->factor_item_list_method);
        $sheets[] = new LPAMaterial($this->data, $this->factor_item_list_material);
        $sheets[] = new LPAFlowOfNonConforming($this->data, $this->factor_item_list_non_forming);
        
        return $sheets;
    }
}
