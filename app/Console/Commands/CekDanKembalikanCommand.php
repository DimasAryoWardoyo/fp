<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use Illuminate\Console\Command;

class CekDanKembalikanCommand extends Command
{
    protected $signature = 'peminjaman:cek-dan-kembalikan';
    protected $description = 'Cek peminjaman yang sudah jatuh tempo dan kembalikan stok secara otomatis';

    public function handle()
    {
        $peminjamanSelesai = Peminjaman::where('status', 'berlangsung')
            ->whereDate('tanggal_kembali', '<', now())
            ->get();

        foreach ($peminjamanSelesai as $peminjaman) {
            $perlengkapan = $peminjaman->perlengkapan;
            if ($perlengkapan) {
                $perlengkapan->stok += $peminjaman->jumlah;
                $perlengkapan->save();
            }

            $peminjaman->status = 'selesai';
            $peminjaman->save();
        }

        $this->info('Stok barang berhasil dikembalikan untuk peminjaman yang selesai.');
    }
}
