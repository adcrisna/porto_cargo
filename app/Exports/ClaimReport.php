<?php

namespace App\Exports;

use App\Models\Claims;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Auth;

class ClaimReport implements FromView,ShouldAutoSize,WithColumnFormatting,WithCustomValueBinder
{
    private $date;

     public function __construct($tanggalAwal, $tanggalAkhir)
    {
        $this->awal = $tanggalAwal;
        $this->akhir = $tanggalAkhir;
    }

    public function view(): View
    {
        $awal = $this->awal;
        $akhir = $this->akhir;
        $start = date("Y-m-d 00:00:00", strtotime($awal));
        $end = date("Y-m-d 23:59:59", strtotime($akhir));
        $claim = Claims::where('user_id', Auth::user()->id)->whereBetween('created_at', [$start, $end])->get();

        return view('excel.claim', [
            'claim' => $claim,
        ]);
    }

    public function bindValue(Cell $cell, $value)
    {
        $cell->setValueExplicit($value, DataType::TYPE_STRING);
        return true;

    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
