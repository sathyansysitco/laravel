<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('checkout', compact('cart', 'total'));
    }




    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'total' => $total,
            'user_id' => auth()->id(),
        ]);

        foreach ($cart as $item) {
            $order->items()->create([
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        // 📩 Send email
        Mail::to($request->user() ? $request->user()->email : 'customer@example.com')
            ->send(new OrderConfirmation($order));

        session()->forget('cart');
        return redirect()->route('thank-you');

        //return redirect('/products')->with('success', 'Order placed successfully and confirmation email sent!');
    }


public function invoice(Order $order)
{
    $pdf = Pdf::loadView('invoices.invoice', compact('order'));
    return $pdf->download('invoice-order-' . $order->id . '.pdf');
}

}

