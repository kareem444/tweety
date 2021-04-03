<?php

namespace App\Http\Controllers;

use App\Model\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public static function create(){
        return view('offers.create');
    }

    public static function store(Request $request){
        $messeges = [
            'name.required' => __('messeges.offer name required'),
            'price.required' => __('messeges.offer price required'),
            'details.required' => __('messeges.offer details required'),
        ];

        $validator = Validator::make($request->all() , [
            'name' => ['required' , 'max:100' , 'string' , 'unique:offers,name'],
            'price' => ['required' , 'numeric'],
            'details' => ['required'],
        ] , $messeges);

        if ($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }else{
            Offer::create([
                'name' => $request -> name ,
                'price' => $request -> price ,
                'details' => $request -> details ,
            ]);

            return redirect()->back()->with(['success' => ' تم اضافة العرض بنجاح ']);
            }
    }
}
