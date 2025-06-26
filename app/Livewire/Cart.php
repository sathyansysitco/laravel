<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Cart extends Component
{
    public $cart = [];
    protected $listeners = ['addToCart'];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);
        $cart = $this->cart;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        $this->cart = $cart;
        session()->put('cart', $cart);
    }

    public function increment($id)
    {
        $this->cart[$id]['quantity']++;
        session()->put('cart', $this->cart);
    }

    public function decrement($id)
    {
        if ($this->cart[$id]['quantity'] > 1) {
            $this->cart[$id]['quantity']--;
        } else {
            unset($this->cart[$id]);
        }

        session()->put('cart', $this->cart);
    }

    public function remove($id)
    {
        unset($this->cart[$id]);
        session()->put('cart', $this->cart);
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
