<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\BussesRoute;

use DB;
use Auth;

use App\Routes;

class BookingsController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }



       public function book()
    {


         
        $locat = \App\locations::all();

     //   $busses =   \App\Busses::paginate(5);
      /*  return view('location');*/

        return view('book', compact('locat'));
        //return   $locat;
    }


      public function booking($id)
    {



  
      $route = Routes::find($id);

      $bs=$route->busses[0]->BusIdentifier;
        

         $boo= false;
        if($route->Ret==0){
            $boo= false;
        }

        else{
            $boo= true;
        }




       $name=  Auth::user()->name;
         

     //   dd($name);

        //dd($boo);
     
     // dd($route->Ret);
     // die($route->busses);

     /* die($route->busses);*/
         
     /*   $locat = \App\Locations::all();*/

     //   $busses =   \App\Busses::paginate(5);
      /*  return view('location');*/

        return view('booking', compact('route','bs','boo','name'));
        //return   $locat;
    }


     public function see()
    {
          $bookings = \App\Bookings::all();

          
        return view('bookings', compact('bookings'));

    }

     public function cancel($id)
    {

           $b = \App\Bookings::findOrFail($id);
           
        
      //   die($b); 

         $from =  $b->from;
         $to =  $b->to;
         $depart =  $b->depart;
         $bus =  $b->bus;
         $timein =  $b->timein;
        
   $val =\App\Routes::where([['from', '=', $from],['to', '=', $to],['Depart', '=',  $depart], ['timein', '=',  $timein]])->get();
        
 // dd($val[0]->id); 


  $rot =Routes::where([['id', '=',$val[0]->id]])->first();

  $bok =\App\Bookings::where([['id', '=',$id]])->first();

  //die($bok);

   /* $q=DB::table('routes')
    ->join('busses', 'busses.id', '=', 'routes.id')
    ->where([['from', '=',$from ], ['to', '=', $to] ])
    ->get();*/


     DB::beginTransaction();

try {

 // dd($rot->capacity);
  $num = $rot->capacity;

  $booked = $rot->seats_booked;

 
  $final =$num+1;
  $rot->capacity=$final;

  $boo =$booked-1;


 


  $rot->seats_booked=$boo;

  $pro = $rot->profit;

  $prof= $rot->fare * $boo;


  $rot->profit=$prof;
     $rot->save();

     $bok->status= 0;
     $bok->save();
 /* dd($rot->profit);*/
//dd($rot->seats_booked);

 //dd($rot->capacity);

  //  $rot->save();
    DB::commit();
} catch (\Throwable $e) {
    DB::rollback();
    throw $e;
}
  
  




   // die($q);

          
        return view('bookings', compact('bookings'));

    }



public function save(Request $request)
    {
      $this->validate($request, [
            'name'=>'required',
            ]);


     //   $bokings = \App\bookings::create($request->all());

      $b = new \App\Bookings;

        $b->user_id =Auth::user()->id;

           $b->name=Auth::user()->name;
          //dd(Auth::user()->name);
        //     die($request->depart);
           $b->depart=$request->depart;

           $b->from=$request->from;


           $b->to=$request->to;


            $b->bus=$request->bu;

             $b->timein=$request->timein;
            $b->timereturn=$request->timereturn;


    //  dd($request->return);
         if($request->return==null){
          $request->return =0;
            $b->ret=0;
         }

         else{
          $b->ret=1;
          $request->return =1;
         }


  //    dd( $b->ret);
    //     die($request->from.$request->to);



 $val =Routes::where([['from', '=', $request->from],['to', '=', $request->to], ['ret', '=',  $request->return], ['Depart', '=',  $request->depart]])->get();





     
        
        

        $b->status=true;


         $b->save();

  $rot =Routes::where([['id', '=',$val[0]->id]])->first();



  DB::beginTransaction();

try {

 // dd($rot->capacity);
  $num = $rot->capacity;

  $booked = $rot->seats_booked;

 
  $final =$num-1;
  $rot->capacity=$final;

  $boo =$booked+1;


 


  $rot->seats_booked=$boo;

  $pro = $rot->profit;

  $prof= $rot->fare * $boo;


  $rot->profit=$prof;

 /* dd($rot->profit);*/
//dd($rot->seats_booked);

 //dd($rot->capacity);

  //  $rot->save();
    DB::commit();
} catch (\Throwable $e) {
    DB::rollback();
    throw $e;
}
  
  
  $rot->save();


      //    return view('booking');

        /*   return redirect()->back()
            ->with('flash_message', 'Bus Booked');*/

            return redirect('pay');
    }

        







        public function store(Request $request)
    {
        
        $this->validate($request, [
            'from'=>'required',
            'to'=>'required',
            'depart'=>'required',
            ]);

         
     //   die($request->from  . $request->to  .  $request->depart. $request->return);
      
        $from = $request->from;

        $to =   $request->to;

        $Depart =   $request->depart;


        $retur =   $request->return;


        $arrive =   $request->Arrive;
     
        //  dd( $retur);
           
          if($retur==null){
            $retur=0;
          }

          else{
              $retur=1;
          }
         

   //      dd($retur);



   //       dd( $request->all());

  
    //  $val =\App\Routes::where('from', '=', $from )->first();
$val =\App\Routes::where([['from', '=', $from],['to', '=', $to],['Depart', '=', $Depart], ['Ret', '=',  $retur]])->get();


//die( $val);
/*$val =\App\Routes::where([['from', '=', 'Srinagar'],['to', '=', 'Budgam'],['depart', '=', '2018-01-28'], ['Ret', '='
, '1']])->get();*/
 //die( $val);
 $cars = array();
 $time="12:00"/*$val->timein*/;

 //die($val->id);
/*foreach ($val as $valu) {
  //  die($value->BusIdentifier);
   //  echo "<br>";
  die($valu);
}*/

 //die($val);
//die($val->timein);
/* if($val!=null) {
foreach ($val as $valu) {
 
 foreach ($valu->busses as $value) {
 
  //  die($value->BusIdentifier);
   //  echo "<br>";
    array_push($cars, $value->BusIdentifier);
}
 
}

}*/



 //dd($cars);

 //dd($val->busses);
  //dd($val->busses[0]->BusIdentifier);

        
   //      dd($val);
    //     dd($request->bu);

         $bs = \App\Busses::where('BusIdentifier', '=', $request['bu'])->first();
         
      //   die($bs->id);

       /*  $posts = App\busses::with('routes')->get(); */

   /*   $users = DB::table('users')->where([['status', '=', '1'],['subscribed', '<>', '1'],
])->get();*/


/*
  Appointment::create($request->all());*/
/*    $bus = new \App\Busses;
    $bus->BusIdentifier = $request->bus;
    $bus->vacancy = $request->vacancy;
    $bus->seats = $request->seats;
    
    $bus->save();*/
    /*return redirect('/');
*/
   
       $locat = \App\locations::all();
   // die($val);
    // dd($cars);

   /*  return redirect()->route('book')->with('cars', $cars);*/

   return view('book', compact('cars','locat','time','val'));
    }


    




}
