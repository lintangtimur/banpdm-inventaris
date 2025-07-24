<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Meta\Constant;
use Illuminate\Http\Request;
use App\Models\ItemTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ItemTransactionCreateRequest;
use App\Http\Requests\ItemTransactionUpdateRequest;
use PDF;

class ItemTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = ItemTransaction::with(['item', 'createdBy'])->orderBy('created_at', 'desc');

        // Ambil data filter dari request
        $start = $request->input('start');
        $end = $request->input('end');

        // Jika ada start date, filter dari tanggal tersebut
        if ($start) {
            $query->whereDate('transaction_date', '>=', $start);
        }

        // Jika ada end date, filter sampai tanggal tersebut
        if ($end) {
            $query->whereDate('transaction_date', '<=', $end);
        }

        $itemTransactions = $query->get();

        return view('stock.index', compact('itemTransactions', 'start', 'end'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::with(['category', 'unit'])->get();
        $transactionsType = Constant::TRANSACTION_TYPE;

        return view('stock.create', compact('items', 'transactionsType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemTransactionCreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $itemId = $data['item'];
            $qty = $data['quantity'];
            $type = $data['inout']; // in / out

            // Ambil total stok terakhir dari item
            $stockIn = ItemTransaction::where('item_id', $itemId)
                        ->where('transaction_type', 'in')
                        ->sum('qty');

            // Kalau keluar, pastikan stok cukup
            if ($type === 'out' && $qty > $stockIn) {

                return back()
                    ->withErrors(['error' => 'Stok tidak mencukupi! Stok tersedia: ' . $stockIn])
                    ->withInput();
            }

            // Simpan transaksi
            ItemTransaction::create([
                'item_id' => $itemId,
                'transaction_type' => $type,
                'qty' => $qty,
                'source' => $data['source'],
                'transaction_date' => $data['date'],
                'created_by' => auth()->user()->id,
            ]);

            DB::commit();

            return redirect()
                ->route('stock.index')
                ->with('success', 'Transaksi berhasil disimpan.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withErrors(['error' => $th->getMessage()])
                ->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(ItemTransaction $itemTransaction)
    {
        //
    }

    public function edit(string $id)
    {
        $trx = ItemTransaction::findOrFail($id);

        $items = Item::with(['category', 'unit'])->get();
        $transactionsType = Constant::TRANSACTION_TYPE;

        return view('stock.edit', compact('trx', 'id', 'items', 'transactionsType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemTransactionUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $itemId = $data['item'];
            $qty = $data['quantity'];
            $type = $data['inout']; // in / out

            // Ambil total stok terakhir dari item
            $stockIn = ItemTransaction::where('item_id', $itemId)
                        ->where('transaction_type', 'in')
                        ->where('id', '!=', $id)
                        ->sum('qty');

            // Kalau keluar, pastikan stok cukup
            if ($type === 'out' && $qty > $stockIn) {

                return back()
                    ->withErrors(['error' => 'Stok tidak mencukupi! Stok tersedia: ' . $stockIn])
                    ->withInput();
            }

            // Simpan transaksi
            ItemTransaction::where('id', $id)->update([
                'item_id' => $itemId,
                'transaction_type' => $type,
                'qty' => $qty,
                'source' => $data['source'],
                'transaction_date' => $data['date'],
                'created_by' => auth()->user()->id,
            ]);

            DB::commit();

            return redirect()
                ->route('stock.index')
                ->with('success', 'Transaksi berhasil disimpan.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withErrors(['error' => $th->getMessage()])
                ->withInput();
        }
    }

    public function stock()
    {
        $stocks = DB::table('item_transactions as t')
            ->join('items as i', 'i.id', '=', 't.item_id')
            ->select('i.name as name', 't.item_id', DB::raw("
                SUM(CASE WHEN t.transaction_type = 'in' THEN t.qty ELSE 0 END) -
                SUM(CASE WHEN t.transaction_type = 'out' THEN t.qty ELSE 0 END) as qty
            "))
            ->groupBy('t.item_id', 'i.name')
            ->get();

        return view('stock.stock', compact('stocks'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($itemTransaction)
    {
        try {
            ItemTransaction::where('id', $itemTransaction)->delete();

            return redirect()->back()->with('success', 'Item transaction deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete item transaction. Error: ' . $e->getMessage());
        }
    }

    public function printPdf(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        $itemTransactions = ItemTransaction::with(['item', 'createdBy'])
            ->when($start && $end, function ($query) use ($start, $end) {
                $query->whereBetween('transaction_date', [$start, $end]);
            })
            ->get();

        $tanggalCetak = Carbon::now()->format('d M Y');

        $pdf = PDF::loadView('stock.pdf', compact('itemTransactions', 'start', 'end', 'tanggalCetak'))
            ->setPaper('a4');

        return $pdf->download("laporan-history-{$tanggalCetak}.pdf");
    }

    public function stockPrintPdf(Request $request)
    {
        $stocks = DB::table('item_transactions as t')
            ->join('items as i', 'i.id', '=', 't.item_id')
            ->select('i.name as name', 't.item_id', DB::raw("
                SUM(CASE WHEN t.transaction_type = 'in' THEN t.qty ELSE 0 END) -
                SUM(CASE WHEN t.transaction_type = 'out' THEN t.qty ELSE 0 END) as qty
            "))
            ->groupBy('t.item_id', 'i.name')
            ->get();

        $tanggalCetak = Carbon::now()->format('d M Y');

        $pdf = PDF::loadView('stock.stockpdf', compact('stocks', 'tanggalCetak'))
            ->setPaper('a4');

        return $pdf->download("laporan-stok-{$tanggalCetak}.pdf");
    }
}
