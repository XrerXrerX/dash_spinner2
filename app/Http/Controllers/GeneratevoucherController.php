<?php

namespace App\Http\Controllers;

use App\Models\GenerateVoucher;
use App\Models\Jenisvoucher;
use App\Models\ApkBo;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class GenerateVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $isdemo = '0', $search_data = null)
    {
        return view('generatevoucher.index', [
            'title' => 'Generate Voucher',
            'menu' => 'bo',
            'total_kalimvoucher' => 0,
            'total_voucher' => 0,
            'total_pengeluaran' => 0,
            'isdemo' => $isdemo,
            'search_data' => $search_data
        ])->with('i', ($request->input('page', 1) - 1) * 1000);
    }

    public function viewtable(Request $request, $isdemo, $search_data = null)
    {
        $filter = "WHERE 1 = 1 ";
        $divisi = auth()->user()->divisi;

        // if ($divisi != 'admin' && $divisi != 'duo') {
        //     $filter .= " AND A.bo = '$divisi'";
        // }

        if ($divisi != 'admin') {
            $filter .= " AND A.bo = '$divisi'";
        }

        if ($search_data != null) {
            $filter .= " AND A.keterangan LIKE '%$search_data%'";
        }

        $query = $this->querySql($isdemo, $filter);

        $sql = DB::select($query);

        return view('generatevoucher.viewtable', [
            'title' => 'Generate Voucher',
            'menu' => 'bo',
            'data' => $sql,
            'total_kalimvoucher' => 0,
            'total_voucher' => 0,
            'total_pengeluaran' => 0,
            'isdemo' => $isdemo,
            'search_data' => $search_data
        ])->with('i', ($request->input('page', 1) - 1) * 1000);


        // $sql = $this->querySql($id);
        // $results = DB::select($sql);

        // return view('generatevoucher.viewtable', [
        //     'title' => 'Voucher',
        //     'data' => $results,
        //     'isproses' => false,
        //     'id' => $id,
        //     'search_data' => $search_data
        // ]);
    }

    function querySql($isdemo, $filter)
    {
        $query = "SELECT * FROM (
            SELECT 
            A.tipe_generate,A.target_bo,
            CASE WHEN A.tgl_exp < DATE(NOW()) THEN 1 ELSE 0 END as isexp, coalesce(A.isdemo,0) as isdemo,
            CASE WHEN COALESCE(D.total_kalimvoucher,0) = COALESCE(E.total_voucher,0) THEN 1 ELSE 0 END as ishabis,
            COALESCE(D.total_kalimvoucher,0) as total_kalimvoucher, COALESCE(E.total_voucher,0) as total_voucher,
            A.id,A.bo, B.nama, A.tgl_exp, A.keterangan, COALESCE(C.total_klaim,0) AS total_klaim, CONCAT(COALESCE(D.total_kalimvoucher,0), '/', COALESCE(E.total_voucher,0)) AS jumlah, 
            COALESCE(F.total,0) as total, A.created_at
             FROM spinner_generatevoucher A
            LEFT JOIN spinner_jenisvoucher B ON A.jenis_voucher = B.index
            LEFT JOIN (
            SELECT A.genvoucherid AS id, COUNT(A.id) AS total_klaim FROM spinner_voucher A
            INNER JOIN spinner_generatevoucher B ON A.genvoucherid = B.id
            WHERE tgl_klaim IS NOT NULL AND COALESCE(status_transfer,0) = 0
            GROUP BY A.genvoucherid
            ) C ON A.id = C.id
            LEFT JOIN (
            SELECT A.genvoucherid AS id, COUNT(A.id) AS total_kalimvoucher FROM spinner_voucher A
            INNER JOIN spinner_generatevoucher B ON A.genvoucherid = B.id
            /* WHERE tgl_klaim IS NOT NULL AND COALESCE(userklaim,'') <> '' */
            WHERE COALESCE(userklaim,'') <> ''
            GROUP BY A.genvoucherid
            ) D ON A.id = D.id
            LEFT JOIN (
            SELECT A.genvoucherid AS id, COUNT(A.id) AS total_voucher FROM spinner_voucher A
            INNER JOIN spinner_generatevoucher B ON A.genvoucherid = B.id
            GROUP BY A.genvoucherid
            ) E ON A.id = E.id
            LEFT JOIN (
            SELECT A.genvoucherid AS id, SUM(C.saldo_point) as total FROM spinner_voucher A
            INNER JOIN spinner_generatevoucher B ON A.genvoucherid = B.id
            LEFT JOIN spinner_jenisvoucher C ON A.jenis_voucher = C.index
            WHERE A.tgl_klaim IS NOT NULL
            GROUP BY A.genvoucherid
            ) F ON A.id = F.id
            
            ) A
            $filter AND A.isdemo = '$isdemo'
            ORDER BY A.isexp ASC, COALESCE(A.total_klaim,0) DESC, A.ishabis ASC, A.created_at DESC
            ";
        return $query;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($isdemo = 1, $search_data = null)
    {
        $datawebsite = ApkBo::get();
        $website = [];
        foreach ($datawebsite as $web) {
            $website[] = $web->nama;
        }
        $jenis_voucher = Jenisvoucher::orderBy('nama', 'DESC')->get();


        //waktu sekarang +7 hari
        $now = time();
        $sevenDaysLater = strtotime('+7 days', $now);
        $datenow = date('Y-m-d', $sevenDaysLater);

        return view('generatevoucher.create', [
            'title' => 'Generate Voucher',
            'website' => $website,
            'jenis_voucher' => $jenis_voucher,
            'datenow' => $datenow,
            'search_data' => $search_data,
            'isdemo' => $isdemo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'bo' => 'required',
            'jenis_voucher' => 'required',
            'tgl_exp' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
            'isdemo' => 'required',
            'total_budget' => 'required',
            'presentase' => 'required',
            'tipe_generate' => 'required',
            'target_bo' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                if ($request->tipe_generate == '1') {

                    $total_budget = intval(str_replace(',', '', $request->total_budget));
                    $budget = 0;
                    $presentase = array_filter($request->presentase, function ($element) {
                        return $element !== null;
                    });

                    $presentase = array_values($presentase);


                    foreach ($request->jenis_voucher as $index => $value) {
                        $jenis_voucher = Jenisvoucher::where('index', '=', $value)->first();

                        $budget += ($request->jumlah * ($presentase[$index] / 100)) * $jenis_voucher->saldo_point;
                    }

                    if ($budget > $total_budget) {
                        return response()->json(['errors' => ['Total jumlah melebihi budget, Mohon periksa kembali.']]);
                    }

                    if (array_sum($presentase) > 100) {
                        return response()->json(['errors' => ['Presentase tidak boleh melebihi 100%, Mohon cek kembali presentase yang anda masukkan.']]);
                    }
                }
                $alldata  = $request->all();

                if ($request->tipe_generate == '1') {
                    $alldata["jenis_voucher"] = implode(',', $alldata["jenis_voucher"]);
                    $alldata["presentase"] = implode(',', $presentase);
                    $alldata["total_budget"] = $total_budget;
                } else {
                    $alldata["presentase"] = "0";
                }

                $generateVoucher = GenerateVoucher::create($alldata);
                try {
                    if ($request->tipe_generate == '1') {
                        $urutanArray = range(1, $request->jumlah);
                        shuffle($urutanArray);

                        foreach ($request->jenis_voucher as $index => $value) {
                            $jenis_voucher = Jenisvoucher::where('index', '=', $value)->first();
                            $jumlah_voucher = ($request->jumlah * ($presentase[$index] / 100));

                            for ($i = 0; $i < $jumlah_voucher; $i++) {
                                Voucher::create([
                                    'userid' => auth()->user()->username,
                                    'jenis_voucher' => $value,
                                    'kode_voucher' => $this->generateUniqueRandomString(10),
                                    'balance_kredit' => 1,
                                    'username' => 'voucher' . $this->generateUniqueRandomString2(5),
                                    'bo' => $generateVoucher->bo,
                                    'saldo' => $jenis_voucher->saldo_point,
                                    'userklaim' => '',
                                    'tgl_klaim' => null,
                                    'tgl_exp' => $request['tgl_exp'],
                                    'genvoucherid' => $generateVoucher->id,
                                    'urutan' => $urutanArray[$i]
                                ]);
                            }
                        }
                    } else {
                        $jenis_voucher = Jenisvoucher::where('index', '=', $generateVoucher->jenis_voucher)->first();
                        for ($i = 1; $i <= $generateVoucher->jumlah; $i++) {
                            try {
                                Voucher::create([
                                    'userid' => auth()->user()->username,
                                    'jenis_voucher' => $generateVoucher->jenis_voucher,
                                    'kode_voucher' => $this->generateUniqueRandomString(10),
                                    'balance_kredit' => 1,
                                    'username' => 'voucher' . $this->generateUniqueRandomString2(5),
                                    'bo' => $generateVoucher->bo,
                                    'saldo' => $jenis_voucher->saldo_point,
                                    'userklaim' => '',
                                    'tgl_klaim' => null,
                                    'tgl_exp' => $request['tgl_exp'],
                                    'genvoucherid' => $generateVoucher->id,
                                    'urutan' => $i
                                ]);
                            } catch (\Exception $e) {
                                dd($e->getMessage());
                                echo "Terjadi kesalahan: " . $e->getMessage();
                            }
                        }
                    }

                    // for ($i = 1; $i <= $request['jumlah']; $i++) {
                    //     Voucher::create([
                    //         'userid' => auth()->user()->username,
                    //         'jenis_voucher' => $generateVoucher->jenis_voucher, // Perhatikan typo pada "jenis_voucher" di baris ini
                    //         'kode_voucher' => $this->generateUniqueRandomString(10),
                    //         'balance_kredit' => 1,
                    //         'username' => 'voucher' . $this->generateUniqueRandomString2(5),
                    //         'bo' => $generateVoucher->bo,
                    //         'saldo' => Jenisvoucher::where('index', $request['jenis_voucher'])->first()->saldo_point,
                    //         'userklaim' => '',
                    //         'tgl_klaim' => null,
                    //         'tgl_exp' => $request['tgl_exp'],
                    //         'genvoucherid' => $generateVoucher->id
                    //     ]);
                    // }

                    return response()->json([
                        'message' => 'Data berhasil disimpan dan Voucher berhasil dibuat.',
                    ]);
                } catch (\Exception $e) {
                    $errorMessage = $e->getMessage();
                    return response()->json([
                        'message' => 'Error : ' . $errorMessage,
                    ]);
                }
                return response()->json([
                    'message' => 'Data berhasil disimpan.',
                ]);
            } catch (\Exception $e) {
                dd($e->getMessage());
                return response()->json(['errors' => ['Terjadi kesalahan saat menyimpan data.']]);
            }
        }

        return response()->json([
            'message' => 'Data berhasil disimpan.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(GenerateVoucher $GenerateVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $var1 = str_replace("&", " ", $id);
        $var2 = explode("values[]=", $var1);
        $var3 = array_slice($var2, 1);
        $var4 = str_replace(" ", "", $var3);

        if (!empty($var4)) {
            $id = $var4;
            foreach ($id as $index => $ids) {
                $generatevoucher[$index] = GenerateVoucher::where('id', $ids)->first();
            }
        } else {
            $generatevoucher = [GenerateVoucher::where('id', $id)->first()];
        }

        return view('generatevoucher.update', [
            'title' => 'Generate Voucher',
            'data' => $generatevoucher,
            'disabled' => '',
            // 'search_data' => $search_data
        ]);
    }

    public function views($id)
    {
        $query = " 
            SELECT A.id,B.nama AS jenis_voucher, A.kode_voucher, A.username AS user_kode, A.userklaim AS no_rekening, A.tgl_klaim, COALESCE(A.status_transfer) AS status_bayar, 
            A1.tgl_exp, A1.userid AS createed_by
            FROM spinner_voucher A
            INNER JOIN spinner_generatevoucher A1 ON A1.id = A.genvoucherid
            LEFT JOIN spinner_jenisvoucher B ON A.jenis_voucher = B.index
            WHERE A.genvoucherid = '85'
        ";
        $sql = DB::select($query);

        return view('voucher.index', [
            'title' => 'Voucher',
            'data' => $sql
        ]);
    }


    public function data($id)
    {
        $data = GenerateVoucher::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        foreach ($id as $index => $idx) {
            $validator = Validator::make($request->all(), [
                'username_shorten.*' => 'required',
                'link_awal.*' => 'required',
                'link_hasil.*' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $result = GenerateVoucher::find($idx);
                    $result->username_shorten = $request->username_shorten[$index];
                    $result->link_awal = $request->link_awal[$index];
                    $result->link_hasil = $request->link_hasil[$index];
                    $result->save();
                } catch (\Exception $e) {
                    return response()->json(['errors' => ['Terjadi kesalahan saat menyimpan data.']]);
                }
            }
        }
        return response()->json(['success' => 'Item berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('values');

        if (!is_array($ids)) {
            $ids = [$ids];
        }

        try {
            foreach ($ids as $id) {
                $generateVoucher = GenerateVoucher::findOrFail($id);
                $generateVoucher->delete();

                Voucher::where('genvoucherid', $id)->delete();
            }
            return response()->json(['success' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            dd($errorMessage);
            return response()->json(['errors' => 'Terjadi kesalahan saat menghapus data.']);
        }
    }

    function generateUniqueRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $maxCharIndex = strlen($characters) - 1;

        do {
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $maxCharIndex)];
            }
        } while ($this->cekData($randomString));

        return $randomString;
    }

    function generateUniqueRandomString2($length)
    {
        do {
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= rand(0, 9);
            }
        } while ($this->cekJenisVoucher($randomString));

        return $randomString;
    }

    function cekData($string)
    {
        $count = Voucher::where('kode_voucher', $string)->count();
        return $count > 0;
    }

    function cekJenisVoucher($string)
    {
        $count = Voucher::where('username', $string)->count();
        return $count > 0;
    }
}
