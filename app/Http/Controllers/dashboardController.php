<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {

            $users = User::all();
            $customers = Customer::all();
            $orders = Order::all();
            $products = Product::all();
            $stocks = Stock::all();
            $categories = Category::all();

            return view('admin.dashboard', compact('users', 'customers', 'orders', 'products', 'stocks', 'categories'));

        } elseif ($user->isCustomer()) {

            $users = User::all();
            $customers = Customer::all();
            $orders = Order::all();
            $products = Product::all();
            $stocks = Stock::all();
            $categories = Category::all();
            
            return view('customer.dashboard', compact('users', 'customers', 'orders', 'products', 'stocks', 'categories'));

        } elseif ($user->isStaff()) {

            $users = User::all();
            $customers = Customer::all();
            $orders = Order::all();
            $products = Product::all();
            $stocks = Stock::all();
            $categories = Category::all();

            return view('staff.dashboard', compact('users', 'customers', 'orders', 'products', 'stocks', 'categories'));
        }

        // Optionally, handle cases where the role does not match
        abort(403, 'Unauthorized action.');
    }
}
