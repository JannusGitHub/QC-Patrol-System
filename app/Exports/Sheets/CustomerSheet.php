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
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class CustomerSheet implements FromView, ShouldAutoSize, WithEvents, WithTitle, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $export_type;
    protected $customers;

    function __construct($export_type, $customers)
    {
        $this->export_type = $export_type;
        $this->customers = $customers;
    }

    public function view(): View {
        if($this->export_type == 1){
            return view('exports.customer_export', ['customers' => $this->customers]);
        }
	}

	public function title(): string
    {
        return 'Customer Audit Report';
    }

    //for designs
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('C1')->getFont()->setSize(30);
                $event->sheet->getDelegate()->getStyle('A2:T2')->getFont()->setSize(13);
                $event->sheet->getColumnDimension('M')->setWidth(35)->setAutoSize(false);
                // $event->sheet->getRowDimension(3)->setRowHeight(50);
            },
        ];
    }

    // For drawing only
    public function drawings()
    {
        $drawings = [];
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('storage/design/pricon_logo3.png'));
        $drawing->setHeight(52);
        $drawing->setCoordinates('A1');

        $drawings[] = $drawing;

        // for($index = 0; $index < count($this->customers); $index++){
        //     $drawing = new Drawing();
        //     $drawing->setName('Logo');
        //     $drawing->setDescription('This is my logo');
        //     if($this->customers[$index]->img_illustration != "" || $this->customers[$index]->img_illustration != null) {
        //         $drawing->setPath(public_path('storage/design/pricon_logo3.png'));
        //     }
        //     else{
        //         $drawing->setPath(public_path('storage/image-icon.png'));
        //     }
        //     $drawing->setHeight(52);
        //     $drawing->setCoordinates('M' . ($index + 2));
        //     $drawings[] = $drawing;
        // }

        return $drawings;
    }
}
