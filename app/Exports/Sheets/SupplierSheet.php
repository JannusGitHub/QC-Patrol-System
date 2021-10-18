<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
Use \Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class SupplierSheet implements FromView, ShouldAutoSize, WithEvents, WithTitle, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $export_type;
    protected $suppliers;

    function __construct($export_type, $suppliers)
    {
        $this->export_type = $export_type;
        $this->suppliers = $suppliers;
    }

    public function view(): View {
        if($this->export_type == 1){
            return view('exports.supplier_export', ['suppliers' => $this->suppliers]);
        }
	}

	public function title(): string
    {
        return 'Supplier Audit Report';
    }

    //for designs
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('D1')->getFont()->setSize(30);
                $event->sheet->getDelegate()->getStyle('A2:V2')->getFont()->setSize(13);
            },
        ];
    }

    // For drawing only
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('storage/design/pricon_logo3.png'));
        $drawing->setHeight(52);
        $drawing->setCoordinates('A1');

        return [$drawing];
    }
}
