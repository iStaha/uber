<?php

namespace App\Http\Controllers;


use Input;
use App\Locations;
use App\Bookings;
use DB;
use Excel;
use Illuminate\Http\Request;

class  MaatwebsiteDemoController extends Controller
{
   


     
    

    public function downloadExcel($type)
    {
        $data = Locations::get()->toArray();
      //  dd($data);
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

     public function bookings($type)
    {
        $data = Bookings::get()->toArray();
      //  dd($data);
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }




      public function downloadE(Request $request, $type)
    {

   //   dd($request->dat);
       
        $dat = \App\Routes::where([['depart', '=', $request->dat]])->get();
        $data = \App\Routes::where([['depart', '=', $request->dat],['seats_booked', '>', '0']])->get()->toArray();
        

       //dd($data);
//$existing_array = array('a'=>'b', 'b'=>'c');

//array('a'=>'b', 'b'=>'c','d'=>'e', 'f'=>'g')
//array_merge($existing_array, $new_array);

         $rts = array();

function array_push_assoc($array, $key, $value){
$array[$key] = $value;
//dd($array);
return $array;
}
//array_push($data, array($category => $question);
       foreach ($dat as $links) {
   

  // die($links->busses);
      foreach ($links->busses as $link) {

  // dd($link->BusIdentifier);
    //   array_push($rts, array('BusIdentifier' => $link->BusIdentifier));
        $v=  array_push_assoc($rts, 'BusIdentifier', $link->BusIdentifier);

    //    dd($v);
         // array_push($rts, $v );

}

//dd($rts);


//array_push($rts, array('BusIdentifier' => $link->BusIdentifier));

//dd($link);
   
   

}

$collection = collect([]);

 foreach ($data as $index=> $links) {

    
    // dd($index);
   $xa= array_merge( $links  , $v);
   $collection->push($xa);

   // array_push($rts, $link->BusIdentifier);
    
   /* foreach ($links as $link) {

    }*/
}


//$new_array = array(array('BusIdentifier'=>'e'));

  //dd($rts);

//dd($collection->toArray());

$dum =$collection->toArray();


 // array_merge($data, $rts);

 //dd(array_merge($data, $rts));
        return Excel::create('itsolutionstuff_example', function($excel) use ($dum) {
            $excel->sheet('mySheet', function($sheet) use ($dum)
            {
                $sheet->fromArray($dum);
            });
        })->download($type);
    }
    

    

    
}
