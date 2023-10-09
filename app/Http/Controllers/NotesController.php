<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Support\Facades\Validator;
use App\Models\ApkBo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NotesController extends Controller
{
    public function index()
    {
        $notes = Notes::latest()->get();
        return view('notes.index', [
            'title' => 'List Notes',
            'data' => $notes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create', [
            'title' => 'List Notes'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'userid' => 'required',
                'warna' => 'required',
                'judul' => 'required',
                'isi' => 'required',
            ]);

            Notes::create($validatedData);

            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan.'
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ];

            return response()->json($response, 500);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bo  $bo
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $bo)
    {
        return view('show', compact('bo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $bo
     * @return \Illuminate\Http\Response
     */
    public function data($id)
    {
        $data = Notes::find($id);
        return response()->json($data);
    }
    public function datanotes($id)
    {
        $data = ApkBo::find($id);
        $bonama = '';
        if ($data['nama'] == 'arwana') {
            $bonama = 'ARWANATOTO';
        } else if ($data['nama'] == 'jeep') {
            $bonama = 'JEEPTOTO';
        } else if ($data['nama'] == 'doyantoto') {
            $bonama = 'DOYANTOTO';
        } else if ($data['nama'] == 'tstoto') {
            $bonama = 'TSTOTO';
        } else if ($data['nama'] == 'arta') {
            $bonama = 'ARTA4D';
        } else if ($data['nama'] == 'neon') {
            $bonama = 'NEON4D';
        } else if ($data['nama'] == 'zara') {
            $bonama = 'ZARA4D';
        } else if ($data['nama'] == 'roma') {
            $bonama = 'ROMA4D';
        } else if ($data['nama'] == 'nero') {
            $bonama = 'NERO4D';
        } else if ($data['nama'] == 'duo') {
            $bonama = 'JEEPTOTO';
        } else if ($data['nama'] == 'toke') {
            $bonama = 'DUOGAMING';
        }
        $data = [
            'id' => $data['id'],
            'nama' => $bonama,
            'site' => $data['site']
        ];
        return response()->json($data);
    }


    // public function edit(Notes $notes)
    // {
    //     dd($notes);
    //     $data = getDataBo();

    //     return view('dashboard.notes.edit', [
    //         'title' => 'WEB - Slider',

    //         'data' => $data
    //     ], compact('notes'));
    // }

    public function edit($id)
    {
        $var1 = str_replace("&", " ", $id);
        $var2 = explode("values[]=", $var1);
        $var3 = array_slice($var2, 1);
        $var4 = str_replace(" ", "", $var3);

        if (!empty($var4)) {
            $id = $var4;
            foreach ($id as $index => $ids) {
                $notes[$index] = Notes::where('id', $ids)->first();
            }
        } else {
            $notes = [Notes::where('id', $id)->first()];
        }

        return view('notes.update', [
            'title' => 'List Notes',
            'data' => $notes,
            'disabled' => ''
        ]);
    }

    public function views($id)
    {
        $var1 = str_replace("&", " ", $id);
        $var2 = explode("values[]=", $var1);
        $var3 = array_slice($var2, 1);
        $var4 = str_replace(" ", "", $var3);

        if (!empty($var4)) {
            $id = $var4;
            foreach ($id as $index => $ids) {

                $notes[$index] = Notes::where('id', $ids)->first();
            }
        } else {
            $notes = [Notes::where('id', $id)->first()];
        }

        return view('notes.update', [
            'title' => 'List Notes',
            'data' => $notes,
            'disabled' => 'disabled'
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'userid' => 'required',
            'warna' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $data = Notes::find($id);

        if (!$data) {
            return response()->json(['error' => 'Data not found.'], 404);
        }

        try {
            $data->userid = $validatedData['userid'];
            $data->warna = $validatedData['warna'];
            $data->judul = $validatedData['judul'];
            $data->isi = $validatedData['isi'];
            $data->save();

            return response()->json(['success' => 'Data updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating data: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $bo
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $ids = $request->input('values');

        if (!is_array($ids)) {
            $ids = [$ids];
        }

        foreach ($ids as $id) {
            $data = Notes::find($id);

            if ($data) {
                $foto_url = $data->foto_url;
                Storage::delete('public/' . $foto_url);


                // Hapus data dari database
                $data->delete();
            }
        }

        return response()->json(['success' => true]);
    }

    public function searchindex()
    {
        $data = Notes::latest();
        $search = request('search');

        if ($search != '') {
            $data = $data->filter(request(['search']));
        }

        $data = $data->paginate(10)->withQueryString();


        // Mengembalikan data dalam bentuk JSON
        return response()->json($data);
    }
}
