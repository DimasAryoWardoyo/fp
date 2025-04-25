<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identitas;
use Illuminate\Support\Facades\Http;

class BroadcastController extends Controller
{
    public function index()
    {
        return view('broadcast.form');
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $identitasList = Identitas::whereNotNull('no_whatsapp')->get();
        foreach ($identitasList as $identitas) {
            $this->sendWA($identitas->no_whatsapp, $request->message);
        }

        return back()->with('success', 'Pesan broadcast berhasil dikirim!');
    }

    private function sendWA($phone, $message)
    {
        $token = env('FONNTE_API_TOKEN');
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post('https://api.fonnte.com/send', [
                    'target' => $phone,
                    'message' => $message,
                    'countryCode' => '62', // opsional
                ]);

        if ($response->failed()) {
            logger("Gagal mengirim pesan ke $phone: {$response->body()}");
        }
    }

    private function formatPhone($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (substr($phone, 0, 1) === '0') {
            return '62' . substr($phone, 1);
        }
        return $phone;
    }
}
