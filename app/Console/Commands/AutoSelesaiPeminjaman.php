<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoSelesaiPeminjaman extends Command
{
    protected $signature = 'peminjaman:auto-selesai';
    protected $description = 'Menandai peminjaman sebagai selesai jika sudah melewati tanggal kembali';

    public function handle()
    {
        $today = Carbon::today();

        $peminjamans = Peminjaman::where('status', 'berlangsung')
            ->whereDate('tanggal_kembali', '<', $today)
            ->get();

        foreach ($peminjamans as $peminjaman) {
            $perlengkapan = $peminjaman->perlengkapan;
            $perlengkapan->increment('stok', $peminjaman->jumlah);

            $peminjaman->status = 'selesai';
            $peminjaman->save();

            $this->info("Peminjaman #{$peminjaman->id} ditandai selesai (otomatis).");
        }

        return 0;
    }
}
