<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Input;

class UnionController extends Controller
{

    public function index()
    {
        $page = Input::get('page',1);
        $paginate = 5;
        $id= 1;

        $members = DB::table('members')
        ->select('id','firstname','lastname','email')
        ->where('site_id', $id);

        // dd($members);

        $data = DB::table('users')
        ->select('id','firstname','lastname','email')
        ->where('site_id', $id)
        ->union($members)
        ->paginate(5);

        $data1 = json_decode($data, true);
        $count = count($data);
        // dd($data);
        $offset = ($page*$paginate) - $paginate;
        $itemsforCurrentPage = array_slice($data1, $offset, $paginate);

        // $data = new \Illuminate\Pagination\LengthAwarePaginator($itemsforCurrentPage, count($data), $paginate, $page);

        return view('index',compact('data','count'));
    }
}
