<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with(["category", "unit"])->get();

        return view("master.item.index", compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();

        return view("master.item.create", compact("categories","units"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            // Simpan ke database
            Item::create([
                'name'       => $data['name'],
                'code'       => $data['code'],
                'category_id' => $data['category'],
                'unit_id'    => $data['unit'],
                'min_stock'  => $data['min_stock'],
                'location'   => $data['location'] ?? null,
            ]);

            DB::commit();

            return redirect()
                ->route('item.index')
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
        $categories = Category::all();
        $units = Unit::all();
        $item = Item::findOrFail($id);

        return view("master.item.edit", compact("id",'item','categories','units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            // Ambil data yang sudah divalidasi
            $data = $request->validated();

            // Cari item berdasarkan ID
            $item = Item::findOrFail($id);

            // Update data item
            $item->update([
                'name'       => $data['name'],
                'code'       => $data['code'],
                'category_id'   => $data['category'],
                'unit_id'       => $data['unit'],
                'min_stock'  => $data['min_stock'],
                'location'   => $data['location'] ?? null,
            ]);

            DB::commit();

            return redirect()
                ->route('item.index')
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
