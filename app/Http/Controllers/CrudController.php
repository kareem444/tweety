<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Model\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class CrudController extends Controller
{
    public function index()
    {
        $offers = Offer::select(
            'id',
            'price',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
        )->get();
        return view('offers.index' , compact('offers'));
    }

    public static function create()
    {
        return view('offers.create');
    }

    public static function store(OfferRequest $request)
    {
        // $messeges = [
        //     'name.required' => __('messeges.offer name required'),
        // ];

        // $validator = Validator::make($request->all() , [
        //     'name' => ['required' , 'max:100' , 'string' , 'unique:offers,name'],
        //     'price' => ['required' , 'numeric'],
        //     'details' => ['required'],
        // ] , $messeges);

        // if ($validator -> fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput($request->all());
        // }else{
        //     Offer::create([
        //         'name' => $request -> name ,
        //         'price' => $request -> price ,
        //         'details' => $request -> details ,
        //     ]);

        //     return redirect()->back()->with(['success' => ' تم اضافة العرض بنجاح ']);
        //     }

        Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);

        return redirect()->back()->with(['success' => ' تم اضافة العرض بنجاح ']);
    }
}
