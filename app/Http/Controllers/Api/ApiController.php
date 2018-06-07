<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    use ApiResponser;

    /**
     * Construct parent Controller
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api');
    }
}
