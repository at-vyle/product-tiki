<?php
namespace App\Http\Controllers\Api;

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
    * @param Illuminate\Http\Request $request time range and type
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {

        if ($request->time) {
            $timeStr = config('define.homepage.request.time.'.$request->time);
            $time = new Carbon($timeStr);
        } else {
            $time = new Carbon(Carbon::minValue());
            $request->time = $timeStr = config('define.homepage.request.time.all');
        }

        if ($request->type == config('define.homepage.type.user')) {
            $users = User::with('userInfo')->withCount(['comments' => function ($query) use ($time) {
                return $query->where('created_at', '>', $time);
            }, 'posts' => function ($query) use ($time) {
                return $query->where('created_at', '>', $time);
            }])->get();

            foreach ($users as $user) {
                $pointCalculated = $user->comments_count + $user->posts_count;
                $user['point'] = $pointCalculated;
                $user['routes'] = route('admin.users.show', array('id' => $user->id));
            }
            $data['users'] = $users->sortByDesc('point')->take(config('define.homepage.numberOfRecords'))->values();
        }

        if ($request->type == config('define.homepage.type.order')) {
            $topOrders = Order::where('created_at', '>', $time)->with('user')->withCount('orderdetails')
                                ->orderBy('total', 'desc')->take(config('define.homepage.numberOfRecords'))->get();
            foreach ($topOrders as $order) {
                $order['routes'] = route('admin.orders.show', ['id' => $order['id']]);
            }
            $data['topOrders'] = $topOrders;
        }

        $data['numberOfRecords'] = config('define.homepage.numberOfRecords');
        $data['time'] = __('homepage.admin.time.'.$request->time);

        return $data;
    }
}
