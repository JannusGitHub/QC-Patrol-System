<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
Use \Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class LPAMaterial implements FromView, WithTitle, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $data;
    protected $factor_item_list_material;
    protected $range1;

    function __construct($data, $factor_item_list_material)
    {
        $this->data = $data;
        $this->factor_item_list_material = $factor_item_list_material;
    }


    public function view(): View {
        return view('exports.lpa_material', ['data' => $this->data, 'factor_item_list_material' => $this->factor_item_list_material]);
    }


    public function title(): string
    {
        return 'LPA-MATERIAL';
    }


    public function registerEvents(): array
    {

        $data = $this->data;
        
        $alignCenter = array(
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ]
                );
        
        $fontArial = array(
            'font' => array(
                'name'      =>  'Arial',
            )
        );

        $font11 = array(
            'font' => array(
                'name'      =>  'Arial',
                'size'      =>  11,
                // 'color'      =>  'red',
                // 'bold'      =>  true
            )
        );

        $font12 = array(
            'font' => array(
                'name'      =>  'Arial',
                'size'      =>  12,
                // 'color'      =>  'red',
                // 'bold'      =>  true
            )
        );

        $borderThin = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => '000000']
                ]
            ]
        ];
        return [
            AfterSheet::class => function(AfterSheet $event) use ($alignCenter, $borderThin, $font11, $font12, $fontArial, $data) {
                // Set Column Width
                $event->sheet->getColumnDimension('A')->setWidth(10);
                $event->sheet->getColumnDimension('B')->setWidth(10);
                $event->sheet->getColumnDimension('C')->setWidth(10);

                // Set Row Height
                // $event->sheet->getRowDimension(24)->setRowHeight(29);

                // Set Alignment & Font
                $event->sheet->getDelegate()->getStyle('K')->applyFromArray($alignCenter);
                $event->sheet->getDelegate()->getStyle('L')->applyFromArray($alignCenter);
                $event->sheet->getDelegate()->getStyle('A3:A4')->applyFromArray($alignCenter);
                $event->sheet->getDelegate()->getStyle('A3:A4')->applyFromArray($fontArial);
                $event->sheet->getDelegate()->getStyle('A10:A11')->applyFromArray($alignCenter);
                $event->sheet->getDelegate()->getStyle('A10:A11')->applyFromArray($font12);
                $event->sheet->getDelegate()->getStyle('A1:A2')->applyFromArray($font11);
                $event->sheet->getDelegate()->getStyle('B8:G8')->applyFromArray($alignCenter);
                $event->sheet->getStyle('A14:J14')->getAlignment()->setWrapText(true);
                
                // $event->sheet->getDelegate()->getStyle('A14:J14')->getAlignment()->setWrapText(true);
                // $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);

            },
        ];
    }
}
