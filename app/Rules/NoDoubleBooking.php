<?php

namespace App\Rules;

use App\Models\Peminjaman;
use Illuminate\Contracts\Validation\Rule;

class NoDoubleBooking implements Rule
{
    protected $ruanganId;
    protected $start;
    protected $end;
    protected $excludeId;

    public function __construct($ruanganId, $start, $end, $excludeId = null)
    {
        $this->ruanganId = $ruanganId;
        $this->start = $start;
        $this->end = $end;
        $this->excludeId = $excludeId;
    }

    public function passes($attribute, $value)
    {
        $query = Peminjaman::where('ruangan_id', $this->ruanganId)
            ->where('status', 'disetujui')
            ->where(function($q) {
                $q->whereBetween('start_time', [$this->start, $this->end])
                  ->orWhereBetween('end_time', [$this->start, $this->end])
                  ->orWhere(function($q) {
                      $q->where('start_time', '<', $this->start)
                        ->where('end_time', '>', $this->end);
                  });
            });

        if ($this->excludeId) {
            $query->where('id', '!=', $this->excludeId);
        }

        return !$query->exists();
    }

    public function message()
    {
        return 'Ruangan sudah dipesan pada jangka waktu tersebut. Silakan pilih waktu lain.';
    }
}