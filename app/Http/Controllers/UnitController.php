<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();

        return view('master.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master.unit.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            Unit::create([
                'name' => $data['name']
            ]);

            DB::commit();

            return redirect()
                ->route('unit.index')
                ->with('success', 'Item berhasil disimpan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Unit::findOrFail($id);

        return view('master.unit.edit', compact('item','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            // Ambil data yang sudah divalidasi
            $data = $request->validated();

            // Cari item berdasarkan ID
            $item = Unit::findOrFail($id);

            // Update data item
            $item->update([
                'name'       => $data['name'],
            ]);

            DB::commit();

            return redirect()
                ->route('unit.index')
                ->with('success', 'Item berhasil diperbarui.');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat update data.'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
