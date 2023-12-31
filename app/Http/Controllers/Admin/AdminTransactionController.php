<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
use App\Exports\TransactionExport;

class AdminTransactionController extends Controller
{
    // get list transaction 
    public function index(Request $request)
    {
        $arr = [];
        $transactions = Transaction::with(['payment'])->whereRaw(1);



        /*      if ($request->id) $transactions->where('id',$request->id);
        if ($email = $request->email) {
            $transactions->where('tst_email','like','%'.$email.'%');
        }

        if ($type = $request->type) {
            if ($type == 1)
            {
                $transactions->where('tst_user_id','<>',0);
            }else {
                $transactions->where('tst_user_id',0);
            }
        }

        if ($status = $request->status) {
            $transactions->where('tst_status',$status);
        } */

        $transactions = $transactions->orderByDesc('id')
            ->paginate(10);

        if ($request->export) {
            // Gọi tới export excel 
            /*  dd(new TransactionExport($transactions)); */
            return \Excel::download(new TransactionExport($transactions), 'don-hang.xlsx');
        }

        $viewData = [
            'transactions' => $transactions,
            'query'        => $request->query(),
        ];
        return view('admin.transaction.index', $viewData);
    }
    // detail transaction 
    public function getTransactionDetail(Request $request, $id)
    {

        if ($request->ajax()) {
            $orders = Order::with('product:id,pro_name,pro_slug,pro_avatar')->where('od_transaction_id', $id)
                ->get();

            $html = view("components.orders", compact('orders'))->render();

            return response([
                'html' => $html
            ]);
        }
    }
    // xoa don hang da dat
    public function deleteOrderItem(Request $request, $id)
    {
        if ($request->ajax()) {
            $order = Order::find($id);
            if ($order) {
                $money = $order->od_qty * $order->od_price;
                //
                \DB::table('transactions')
                    ->where('id', $order->od_transaction_id)
                    ->decrement('tst_total_money', $money);
                $order->delete();
            }

            return response(['code' => 200]);
        }
    }


    // xoa giao dich
    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->delete();
            \DB::table('orders')->where('od_transaction_id', $id)
                ->delete();
        }

        return redirect()->back();
    }
    // cap nhat trang thai giao dich
    public function getAction($action, $id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('od_transaction_id', $id)->get();
        if ($transaction) {

            switch ($action) {
                case 'process':
                    $transaction->tst_status = 2;
                    foreach ($orders->toArray() as $item) {
                        $product = Product::find($item['od_product_id']);
                        if ($product->pro_number > 0) {
                            $product->pro_number -= $item['od_qty'];
                            $product->save();
                        }
                    }

                    break;
                case 'success':
                    $transaction->tst_status = 3;
                    foreach ($orders->toArray() as $item) {
                        $product = Product::find($item['od_product_id']);
                        if ($product->pro_number > 0) {
                            $product->pro_number -= $item['od_qty'];
                            $product->save();
                        }
                    }
                    break;
                case 'cancel':
                    $transaction->tst_status = -1;
                    # code...
                    break;
            }

            $transaction->save();
        }

        return redirect()->back();
    }
    public function getBill($id)
    {
        $transactions = Transaction::with('payment')->whereRaw(1);
        if ($id) $transactions->where('id', $id);
        $transactions = $transactions->orderByDesc('id')
            ->paginate(10);
        return \Excel::download(new TransactionExport($transactions), 'don-hang.xlsx');
    }
}
