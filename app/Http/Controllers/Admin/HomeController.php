<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Comment;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @param Illuminate\Http\Request $request time range search
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if ($request->time) {
            $timeStr = config('define.homepage.request.time.'.$request->time);
        } else {
            $timeStr = config('define.homepage.request.time.month');
        }
        $time = new Carbon($timeStr);

        $data['newUsers'] = User::where('created_at', '>', $time)->count();
        $data['newPosts'] = Post::where('created_at', '>', $time)->count();
        $data['newOrders'] = Order::where('created_at', '>', $time)->count();

        $data['productSold'] = OrderDetail::whereHas('order', function ($query) {
            return $query->where('status', Order::APPROVED);
        })->sum('quantity');

        $data['topRating'] = Product::where('created_at', '>', $time)->with('category')->orderBy('avg_rating', 'desc')->take(config('define.homepage.numberOfRecords'))->get();
        $users = User::with('userInfo')->withCount(['comments', 'posts'])->get();
        foreach ($users as $user) {
            $pointCalculated = $user->comments_count + $user->posts_count;
            $user['point'] = $pointCalculated;
        }

        $data['users'] = $users->sortByDesc('point')->take(config('define.homepage.numberOfRecords'))->values();
        $data['topOrders'] = Order::with('user')->withCount('orderdetails')->orderBy('total', 'desc')->take(config('define.homepage.numberOfRecords'))->get();
        $data['numberOfRecords'] = config('define.homepage.numberOfRecords');

        return view('admin.pages.index', $data);
    }
}
