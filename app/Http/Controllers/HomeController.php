<?php

namespace App\Http\Controllers;

use Input;
use App\Locations;
use DB;
use Excel;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

     


      public function details(Request $request)
    {
        
        $val =\App\Routes::where([['depart', '=', $request->date], ['seats_booked', '>', '0']])->get();


       //   dd($val);
       // die($val[0]->busses);


       
        // dd($data);
        /*$price = DB::table('routes')->where([['depart', '=', $request->date]]))->sum('profit');*/

        $price = DB::table('routes')->where('depart', '=', $request->date)->sum('profit');

        $seats = DB::table('routes')->where('depart', '=', $request->date)->sum('seats_booked');


        $capacity = DB::table('routes')->where('depart', '=', $request->date)->sum('capacity');

        $total = DB::table('busses')->sum('seats');

//           dd($price);
         return view('home', compact('val','price','seats', 'capacity', 'total'));
    

    }


    /*public function downloadE(Request $request, $type)
    {

      //  dd($request->date);
        $data = \App\Routes::where([['depart', '=', '2018-01-28']])->get()->toArray();
        dd($data);
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }*/
    


  

    

    
}
