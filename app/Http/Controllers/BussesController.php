<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BussesController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }


         public function index()
    {

      /*  $locat = \App\Locations::all();*/

        $busses =   \App\Busses::paginate(5);
      /*  return view('location');*/

        return view('bus', compact('busses'));
        //return   $locat;
    }


        public function store(Request $request)
    {
        
        $this->validate($request, [
            'bus'=>'required|max:300',
            'seats'=>'required|max:100',
            ]);

/*
  Appointment::create($request->all());*/
    $bus = new \App\Busses;
    $bus->BusIdentifier = $request->bus;
    $bus->seats = $request->seats;
    
    $bus->save();


    
    /*return redirect('/');
*/
   
    


   

     return redirect()->back()
            ->with('flash_message', 'Bus created');
    }


    public function edit($id)
    {

            $bus = \App\Busses::findOrFail($id);

             //   dd($loc);

           
            return view('bus.edit', compact('bus'));

    }


      public function update(Request $request, $id)
    {

            $bus= \App\Busses::findOrFail($id);

             //  dd($loc);
              $bus->BusIdentifier = $request->bus;
    
                     $bus->save();
           
             return redirect()->back()
            ->with('flash_message', 'Bus Updated');

    }


    public function destroy(Request $request, $id)
    {

            $bus = \App\Locations::findOrFail($id);

            //   die($loc);
           //   $loc->delete();
    
          
           
             return redirect()->back()
            ->with('flash_message', 'Bus Deleted');
    }



    







}
