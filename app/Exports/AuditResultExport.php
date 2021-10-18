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

class AuditResultExport implements FromView, WithTitle, WithEvents, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     //
    // }

    use Exportable;

    protected $data;
    protected $range1;
    protected $range2;
    protected $range3;

    function __construct($data)
    {
        $this->data = $data;
        // $this->customers = $customers;
        // $this->internals = $internals;
        // $this->suppliers = $suppliers;
        // $this->audit_result_type = $audit_result_type;
    }

    public function view(): View {
        return view('exports.audit_results', ['data' => $this->data]);
    }

    public function title(): string
    {
        return 'QC Patrol Audit Result';
    }

    //for designs
    public function registerEvents(): array
    {
        $this->range1 = 'A10:H' . (count($this->data->ar_finding_details) + 10);
        $range1 = $this->range1;
        $this->range2 = 'A2:H' . (count($this->data->ar_finding_details) + 10);
        $range2 = $this->range2;
        $this->range3 = 'C10:C' . (count($this->data->ar_finding_details) + 10);
        $range3 = $this->range3;
        $this->range4 = 'A10:A' . (count($this->data->ar_finding_details) + 10);
        $range4 = $this->range4;
        $this->range5 = 'A1:H' . (count($this->data->ar_finding_details) + 9);
        $range5 = $this->range5;
        // $this->improvement_plan_col = 'T3:AH' . (count($this->) + 9);
        // $col_range = 'A3:AH' . (count($this->internals) + 2);

        $data = $this->data;
        
        $style = array(
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ]
                );

        $style2 = array(
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_TOP,
                    ]
                );

        $style3 = array(
            'font' => array(
                'name'      =>  'Arial',
                'size'      =>  12,
                // 'color'      =>  'red',
                // 'bold'      =>  true
            )
        );

        $style4 = array(
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ]
                );

        // $line_break = array(
        //     'alignment' => [
        //         'horizontal' => Alignment::HORIZONTAL_LEFT,
        //         'vertical' => Alignment::VERTICAL_CENTER,
        //     ]
        // );

        $styleBorderThin = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000']
                ]
            ]
        ];
        return [
            AfterSheet::class => function(AfterSheet $event) use ($range1, $range2, $range3, $range4, $range5, $style, $style2, $style3, $styleBorderThin, $style4, $data) {
                $event->sheet->getDelegate()->getStyle('A1')->applyFromArray($style);
                $event->sheet->getDelegate()->getStyle('A1')->getFont()->setSize(28);
                // $event->sheet->getDelegate()->getStyle('A2:V2')->getFont()->setSize(13);
                // $event->sheet->getDelegate()->getStyle('Q3:Q353')->getFont()->setSize(13);
                $event->sheet->getDelegate()->getStyle($this->range1)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle($this->range2)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle($this->range2)->getFont()->setSize(12);
                // $event->sheet->getDelegate()->getStyle($this->improvement_plan_col)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('A1')->applyFromArray($style);
                $event->sheet->getDelegate()->getStyle($range1)->applyFromArray($style);
                // $event->sheet->getDelegate()->getStyle($range1)->applyFromArray($styleBorderThin);
                $event->sheet->getDelegate()->getStyle($range3)->applyFromArray($style2);
                $event->sheet->getDelegate()->getStyle($range1)->applyFromArray($style3);
                $event->sheet->getDelegate()->getStyle($range3)->applyFromArray($style3);
                $event->sheet->getDelegate()->getStyle($range2)->applyFromArray($style4);
                $event->sheet->getDelegate()->getStyle('A9:H9')->applyFromArray($style);
                $event->sheet->getDelegate()->getStyle('A9:H9')->getAlignment()->setWrapText(true);
                $event->sheet->getColumnDimension('A')->setWidth(20);
                $event->sheet->getColumnDimension('B')->setWidth(35);
                $event->sheet->getColumnDimension('C')->setWidth(50);
                $event->sheet->getColumnDimension('D')->setWidth(40);
                $event->sheet->getColumnDimension('E')->setWidth(25);
                $event->sheet->getColumnDimension('F')->setWidth(40);
                $event->sheet->getColumnDimension('G')->setWidth(15);
                $event->sheet->getColumnDimension('H')->setWidth(40);
                
                // $event->sheet->getColumnDimension('D10')->setHeight(150);
                $event->sheet->getDelegate()->getStyle($range4)->applyFromArray($style);
                $event->sheet->getDelegate()->getStyle($range5)->applyFromArray($styleBorderThin);
                $event->sheet->getDelegate()->getStyle('A6:H6')->applyFromArray($styleBorderThin);
                $event->sheet->getDelegate()->getStyle('A7:H7')->applyFromArray($styleBorderThin);
                $event->sheet->getDelegate()->getStyle('A1:H1')->applyFromArray($styleBorderThin);
                // $event->sheet->getDelegate()->getStyle('D10')->getAlignment()->setWrapText(true);
                // $event->sheet->getDelegate()->freezePane('A3');
                // $event->sheet->setFreeze('A3:AH');
                
                $start_index_row = 10;
                // $default = 0;
                
                // add height to excel row
                for ($index = 0; $index < count($this->data->ar_finding_details); $index++) { 
                    $event->sheet->getRowDimension($start_index_row)->setRowHeight(120);
                    
                    $start_index_row++;

                    // echo 'row ' . $start_index_row . '<br>';
                }
                // echo 'index row ' . $start_index_row;
                // exit();
                
                //============================== On Going 19-08-21 START -Jannus ==============================
                $start_index_row_actual = 10;
                for ($j = 0; $j < count($this->data->ar_finding_details); $j++) {
                    if($this->data->ar_finding_details[$j]->actual_illustration != null){
                        $exploded_arr_actual_illustration = explode(', ', $this->data->ar_finding_details[$j]->actual_illustration);
                        $default = 0;
                            for ($k = 0; $k < count($exploded_arr_actual_illustration); $k++) { 
                                if($k < count($exploded_arr_actual_illustration)){
                                    $exploded_arr_actual_illustration[$k] . '<br>';
                                    $default += 170;
                                    // echo 'loop ' . $default . '<br>';
                                    
                                    // $spreadsheet->getActiveSheet()->setBreak('D' . $start_index_row_actual, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_COLUMN);
                                    
                                }
                                // echo 'total ' . $default . '<br>';
                                $event->sheet->getRowDimension($start_index_row_actual)->setRowHeight(0 + $default);
                            }
                    }
                    $start_index_row_actual++;
                }
                // exit();
                

                // $event->sheet->getDelegate()->getRowDimension(10)->setRowHeight(200);
                // $event->sheet->getColumnDimension('D')->setAutoSize(true);
                //============================== On Going 19-08-21 END -Jannus ==============================
            },
        ];
    }

    public function drawings()
    {
        $drawings = [];
        $start_index_row = 10;
        //============================== On Going 18-08-21 START -Jannus ==============================
        for ($index = 0; $index < count($this->data->ar_finding_details); $index++) { 
            if($this->data->ar_finding_details[$index]->actual_illustration != null){
                $exploded_arr_actual_illustration = explode(', ', $this->data->ar_finding_details[$index]->actual_illustration);
                $offsetY = 0;
                foreach ($exploded_arr_actual_illustration as $single_actual_illustration) {
                    $drawing = new Drawing();
                    $drawing->setName('Logo');
                    $drawing->setDescription('Pricon logo');
                    $drawing->setPath(public_path('storage/images/actual_illustration/' . $single_actual_illustration));
                    $drawing->setHeight(120);
                    $drawing->setWidth(250);
                    $drawing->setOffsetY($offsetY); 
                    $drawing->setOffsetX(15); 
                    $drawing->setCoordinates('D' . $start_index_row);
                    $drawings[] = $drawing;
                    $offsetY += 150;
                    // $spreadsheet = new Spreadsheet();
                    // $spreadsheet->getActiveSheet()->getSTyle('D' . $start_index_row)->getAlignment()->setWrapText(true);
                    // $spreadsheet->getActiveSheet()->setBreak('D' . $start_index_row, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_COLUMN);
                }
            }
            $start_index_row++;
        }
        return $drawings;
    }
        //============================== On Going 18-08-21 END -Jannus ==============================


    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function(AfterSheet $event) {
    //             $event->sheet->getDelegate()->getStyle('C1')->getFont()->setSize(30);
    //             $event->sheet->getDelegate()->getStyle('A2:X2')->getFont()->setSize(13);
    //         },
    //     ];
    // }

    // // For drawing only
    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('This is my logo');
    //     $drawing->setPath(public_path('storage/design/pricon_logo3.png'));
    //     $drawing->setHeight(52);
    //     $drawing->setCoordinates('A1');

    //     // $drawing2 = new Drawing();
    //     // $drawing2->setName('Other image');
    //     // $drawing2->setDescription('This is a second image');
    //     // $drawing2->setPath(public_path('storage/design/pricon_logo2.png'));
    //     // $drawing2->setHeight(52);
    //     // $drawing2->setCoordinates('G1');

    //     // return [$drawing, $drawing2];

    //     return [$drawing];
    // }

    //for multiple sheets
    // public function sheets(): array
    // {
    //     $sheets = [];

    //     if($this->audit_result_type == 1){
    //     	$sheets[] = new TUVSheet(1, $this->tuvs);
    //     }
    //     else if($this->audit_result_type == 2){
    //     	$sheets[] = new CustomerSheet(1, $this->customers);
    //     }
    //     else if($this->audit_result_type == 3){
    //     	$sheets[] = new InternalSheet(1, $this->internals);
    //     }
    //     else if($this->audit_result_type == 4){
    //     	$sheets[] = new SupplierSheet(1, $this->suppliers);
    //     }

    //     return $sheets;
    // }
}
