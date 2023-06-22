use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        return view('index', compact('pizzas'));
    }

    public function cart()
    {
        // Логика отображения корзины
        $cartItems = // Получение элементов корзины из базы данных или сеанса
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        // Логика добавления пиццы в корзину
        $pizzaId = $request->input('pizza_id');
        $quantity = $request->input('quantity');
        
        // Добавление пиццы в корзину в базе данных или сеансе
        
        return redirect()->route('cart')->with('success', 'Pizza added to cart');
    }

    public function removeFromCart(Request $request)
    {
        // Логика удаления пиццы из корзины
        $itemId = $request->input('item_id');
        
        // Удаление пиццы из корзины в базе данных или сеансе
        
        return redirect()->route('cart')->with('success', 'Pizza removed from cart');
    }

    public function checkout()
    {
        // Логика оформления заказа
        $cartItems = // Получение элементов корзины из базы данных или сеанса
        
        // Подготовка данных для оформления заказа
        
        return view('checkout', compact('cartItems'));
    }
}

