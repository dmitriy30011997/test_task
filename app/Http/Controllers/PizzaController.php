<?php
use App\Models\Pizza;
use App\Models\Cart;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        $pizza = Pizza::all();
        return view('index', compact('pizza'));
    }

    public function cart()
    {
        $cartItems = Cart::all();
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $pizzaId = $request->input('pizza_id');
        $quantity = $request->input('quantity');
        
        // Логика добавления пиццы в корзину
        $cartItem = new Cart();
        $cartItem->pizza_id = $pizzaId;
        $cartItem->quantity = $quantity;
        $cartItem->save();
        
        return redirect()->route('cart')->with('success', 'Pizza added to cart');
    }

    public function removeFromCart(Request $request)
    {
        $itemId = $request->input('item_id');
        
        // Логика удаления пиццы из корзины
        Cart::destroy($itemId);
        
        return redirect()->route('cart')->with('success', 'Pizza removed from cart');
    }

    public function checkout()
    {
        $cartItems = Cart::all(); 
        
        // Логика подготовки данных для оформления заказа
        
        return view('checkout', compact('cartItems'));
    }
}
