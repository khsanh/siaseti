<?php

namespace App\Imports;

use App\Models\Monitoring;
use App\Models\DetailAset;
use Maatwebsite\Excel\Concerns\ToModel;
use DateTime;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class MonitoringImport implements ToCollection, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    function validateDate($date, $format = 'Y-m-d')
    {
        $dat = DateTime::createFromFormat($format, $date);
        return $dat && $dat->format($format) === $date;
    }
    public function convertDate($excel_date)
    {
        if ($this->validateDate($excel_date, 'Y-m-d')) {
            return $excel_date;
        } else if ($this->validateDate($excel_date, 'd-m-Y')) {
            $unix_date = ($excel_date - 25569) * 86400;
            $date = gmdate("Y-m-d", $unix_date);
            return $date;
        } else if ($excel_date == '') {
            return null;
        } else {
            $unix_date = ($excel_date - 25569) * 86400;
            $date = gmdate("Y-m-d", $unix_date);
            return $date;
        }
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as  $row) {
            $detail = DetailAset::where('kode_aset', $row['Kode Aset'])->first();
            if ($detail) {
                $exists = Monitoring::where([
                    ['kondisi', $row['Kondisi']],
                    ['id_detail_aset', $detail->id],
                    ['penyelenggara', $row['Penyelenggara']]
                ])->exists();
                if (!$exists) {
                    DataSertifikasi::create([
                        'id_detail_aset' => $detail->id,
                        'tanggal_monitoring' => $this->convertDate($row['Tanggal Monitoring']),
                        'kondisi' => $row['Kondisi'],
                        'deskripsi' => $row['Deskripsi'],
                        'foto' => $row['Foto']
                    ]);
                }
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
