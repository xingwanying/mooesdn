<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QuneeController extends Controller
{
        public function index()
    {
        $json = "{"nodes":[{"name": "A", "x": -100, "y": -50, "id": 1}, {"name": "B", "id": 2}], "edges": [{"name": "Edge", "from":1, "to":2}]}";
        $data = json_decode($json, true)
        return $datas;
    }
}
