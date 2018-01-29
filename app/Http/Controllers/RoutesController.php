<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use App\BussesRoute;

class RoutesController extends Controller
{
    
       public function __construct()
    {
        $this->middleware('auth');
    }

       public function route()
    {

        $locat = \App\Locations::all();
        $buss = \App\Busses::all();

       /* $busses =   \App\Busses::paginate(5);*/
      /*  return view('location');*/

    
      $rout = \App\Routes::paginate(5);



        return view('route', compact('rout','locat','buss'));
        //return   $locat;
    }


        public function store(Request $request)
    {
        
        $this->validate($request, [
            'from'=>'required',
            'to'=>'required',
            'depart'=>'required',
            'duration'=>'required',
            'fare'=>'required',
            ]);

    // dd($request->all());
/*
  Appointment::create($request->all());*/

 
    

    //  dd($buss[0]->seats);
    $routes = new \App\Routes;
    $routes->from = $request->from;
    $routes->to = $request->to;
   /* $routes->Depart = $request->depart;*/
    $routes->Depart = $request->depart;
    $routes->Duration = $request->duration;
    $routes->timein = $request->timein;
    $routes->fare = $request->fare;
    $routes->timereturn = $request->timereturn;
    $routes->bus = $request->bu;





      $buss = \App\Busses::where([['BusIdentifier', '=',$request->bu]])->get();

      $routes->capacity = $buss[0]->seats;

      

if($request->arrive!=null)
  	           {
 //dd($request->arrive);

  	            	  $routes->Arrive = $request->arrive;    
  	            }


    

       if($request->return == null)
  	            {
                
  	          $routes->Ret = 0;    	
  	            }

  	            else{
  	            	  $routes->Ret = 1;    
  	            }


                if($request->timereturn!=null)

                {

$val =\App\Routes::where([['from', '=', $request->from],['to', '=', $request->to],['Depart', '=',  $request->depart], ['timein', '=',  $request->timein], ['timereturn', '=',  $request->timereturn]])->get();
                }

                else{


             //   dd( $routes->Ret);
//die($request->from . $request->to  .$request->depart . $request->depart . $request->bus . $request->timein);
$val =\App\Routes::where([['from', '=', $request->from],['to', '=', $request->to],['Depart', '=',  $request->depart], ['timein', '=',  $request->timein]])->get();

}

//die($val);

  // die($val);

   if($val->isNotEmpty()){
     return redirect()->back()
            ->with('flash_message', 'Bus already assocatiated with this route on this day and time');
   }

   
   /*$q=DB::table('routes')
    ->join('busses', 'busses.id', '=', 'routes.id')
    ->where('busses.BusIdentifier', '=', 'B1')
    ->get();*/

 //die($request->bu.$request->from .$request->to .$request->timein);
/*$q=DB::table('routes')
    ->join('busses', 'busses.id', '=', 'routes.id')
    ->where([['BusIdentifier', '=', $request->bu]])
    ->get();
   if($q->isNotEmpty()){
   
return redirect()->back()
            ->with('flash_message', 'Bus already assocatiated with this route on this day and time');
  }*/
  // dd($val);
    

   // dd("cscs");
    $routes->save();
    /*return redirect('/');
*/
   
    
 $br =new BussesRoute;

        $br->routes_id = $routes->id;


         $bus = \App\Busses::where('BusIdentifier', '=', $request['bu'])->first();
         
        $br->busses_id = $bus->id;

         $br->save();




   

     return redirect()->back()
            ->with('flash_message', 'Route created');
    }


}
