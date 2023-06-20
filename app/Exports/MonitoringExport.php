<?php

namespace App\Exports;

use App\Models\Monitoring;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class MonitoringExport implements FromCollection, WithHeadings, WithTitle
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->data;
    }
    public function headings(): array
    {
        $header = [
            "Kode Aset",
            "Nama Barang",
            "Tanggal Monitoring",
            "Kondisi",
            "Deskripsi",
            "Foto"
        ];
        return $header;
    }
    public function title(): string
    {
        return 'Data Monitoring';
    }
}
