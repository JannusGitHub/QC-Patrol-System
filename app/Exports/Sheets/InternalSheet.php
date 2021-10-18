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
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class InternalSheet implements FromView, ShouldAutoSize, WithEvents, WithTitle, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $export_type;
    protected $internals;
    protected $statement_of_findings_col;
    protected $improvement_plan_col;

    function __construct($export_type, $internals)
    {
        $this->export_type = $export_type;
        $this->internals = $internals;
    }

    public function view(): View {
        if($this->export_type == 1){
            return view('exports.internal_export', ['internals' => $this->internals]);
        }
	}

	public function title(): string
    {
        return 'Internal Audit Report';
    }

    //for designs
    public function registerEvents(): array
    {
        $this->statement_of_findings_col = 'Q3:Q' . (count($this->internals) + 2);
        $this->improvement_plan_col = 'T3:AH' . (count($this->internals) + 2);
        $col_range = 'A3:AH' . (count($this->internals) + 2);

        
        $style = array(
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ]
                );

        return [
            AfterSheet::class => function(AfterSheet $event) use ($col_range, $style) {
                $event->sheet->getDelegate()->getStyle('D1')->getFont()->setSize(30);
                $event->sheet->getDelegate()->getStyle('A2:V2')->getFont()->setSize(13);
                // $event->sheet->getDelegate()->getStyle('Q3:Q353')->getFont()->setSize(13);
                $event->sheet->getDelegate()->getStyle($this->statement_of_findings_col)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle($this->improvement_plan_col)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle($col_range)->applyFromArray($style);
                $event->sheet->getDelegate()->freezePane('A3');
                // $event->sheet->setFreeze('A3:AH');
            },
        ];
    }

    // For drawing only
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Pricon logo');
        $drawing->setPath(public_path('storage/design/pricon_logo3.png'));
        $drawing->setHeight(52);
        $drawing->setCoordinates('A1');

        return [$drawing];
    }
}
