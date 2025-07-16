<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view("master.category.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master.category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            Category::create([
                'name' => $data['name']
            ]);

            DB::commit();

            return redirect()
                ->route('category.index')
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
        return "category ".$id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Category::findOrFail($id);

        return view('master.category.edit', compact('item','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            // Ambil data yang sudah divalidasi
            $data = $request->validated();

            // Cari item berdasarkan ID
            $item = Category::findOrFail($id);

            // Update data item
            $item->update([
                'name'       => $data['name'],
            ]);

            DB::commit();

            return redirect()
                ->route('category.index')
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
