<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();

        return view('admin.order',['collection' => $order]);
    }

    public function add()
    {
        return view('admin.addorder');
    }

    public function edit(Request $req)
    {
        $order = Order::where('id', $req->id)->first();

        return view('admin.editorder',['collection' => $order]);
    }

    public function addorder(Request $req)
    {
        $order = new Order();
        $order->product_id = $req->product_id;
        $order->product_name = $req->product_name;
        $order->UserName = $req->UserName;
        $order->Mobile = $req->Mobile;
        $order->Delivery_charge = $req->Delivery_charge;
        $order->Pickup_location = $req->Pickup_location;
        $order->Drop_location = $req->Drop_location;
        $order->Cod = $req->Cod;
        $order->Wallet = $req->Wallet;
        $order->Admin_commision = $req->Admin_commision;
        $order->save();

        return redirect('admin/order');
    }

    public function editmyorder(Request $req)
    {
        $order = Order::where('id', $req->id)->first();

        $order->product_id = $req->product_id;
        $order->product_name = $req->product_name;
        $order->UserName = $req->UserName;
        $order->Mobile = $req->Mobile;
        $order->Delivery_charge = $req->Delivery_charge;
        $order->Pickup_location = $req->Pickup_location;
        $order->Drop_location = $req->Drop_location;
        $order->Cod = $req->Cod;
        $order->Wallet = $req->Wallet;
        $order->Admin_commision = $req->Admin_commision;
        $q = $order->update();
        if ($q) {
            return redirect()->back()->with('msg', 'Successfully Edited');
        }
    }

    public function deleteorder(Request $req)
    {
        $order = Order::find($req->id);
        $order->delete();

        return redirect()->back()->with('msg', 'Successfully deleted');
    }
    public function fileExport()
    {
        return Excel::download(new OrdersExport, 'orders-collection.csv');
    }
    // Generate PDF
    public function createPDF() 
    {
      // retreive all records from db
      $data = Order::all();

      // share data to view
      view()->share('order',$data);
      $pdf = PDF::loadView('admin.pdf.orders_pdf', $data);

      // download PDF file with download method
      return $pdf->download('orders.pdf');
    }
}
