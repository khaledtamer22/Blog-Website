<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class singleController extends Controller
{
    public function index(Request $req ,$id = '') {


        $query = "select * from posts where slag = :slag limit 1";
        $row = DB::select($query,['slag'=>$id]);
        
        if($row){
        $query = "select * from categories where id = :id limit 1";
        $category = DB::select($query,['id'=>$row[0]->id]);

        $data['row'] = $row[0];
        $data['category'] = $category;

        }
   

        $query = "select * from categories order by id desc";
        $categories = DB::select($query);
        $data['categories'] = $categories;


        return view('single',$data);

    }

        public function save(Request $req) {

        $required = $req->validate([
            "key" => "required|string",
            "key" => "required|image"
        ]);
        return view('single');
            
        
        
    }
}