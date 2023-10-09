<?php

use App\Models\ApkBo;
use Illuminate\Support\Facades\Http;

function getDataBo()
{
    return ApkBo::all();
}

function getDataBo2()
{
    $session_id = session('id_bo');
    $bonama = '';
    if ($session_id != '') {
        $bo = ApkBo::where('id', $session_id)->first();
        $bonama = $bo->nama;
    } else {
        $bonama = 'arwana';
    }
    return $bonama;
}


function backToDashboard()
{
    return redirect()->route('dashboard');
}

function getDataBo3()
{
    return ApkBo::orderBy('id', 'ASC')->first();
}

function getDataWebsite()
{
    $bearerToken = 'youk1llmyfvcking3x';

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
    ])->get('https://l4soyk0.com/api/datawebsite');

    if ($response->successful()) {
        $data = $response->json()["data"];
        $websites = array_map(function ($item) {
            return $item['website'];
        }, $data);
        return $websites;
    } else {
        // Tampilkan respon status jika permintaan gagal
        dd($response->status());
    }
}

function isAdmin()
{
    return auth()->check() && (auth()->user()->divisi === 'admin');
}
