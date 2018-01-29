<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationsController extends Controller
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

    

     public function index()
    {

      /*  $locat = \App\Locations::all();*/

         $locat =   \App\locations::paginate(5);
      /*  return view('location');*/

        return view('location', compact('locat'));
      //  return   $locat;
    }

 



    public function store(Request $request)
    {
        
        $this->validate($request, [
            'loc'=>'required|max:100',
            ]);

/*
  Appointment::create($request->all());*/
    $loc = new \App\locations;
    $loc->location = $request->loc;
    
   $loc->save();
    /*return redirect('/');
*/
   
    


   

     return redirect()->back()
            ->with('flash_message', 'Location created');
    }



    public function edit($id)
    {

            $loc = \App\locations::findOrFail($id);

             //   dd($loc);

           
            return view('location.edit', compact('loc'));

    }


      public function update(Request $request, $id)
    {

            $loc = \App\locations::findOrFail($id);

             //  dd($loc);
              $loc->location = $request->loc;
    
                     $loc->save();
           
             return redirect()->back()
            ->with('flash_message', 'Location Update');

    }


    public function destroy(Request $request, $id)
    {

            $loc = \App\locations::findOrFail($id);

            //   die($loc);
           //   $loc->delete();
    
          
           
             return redirect()->back()
            ->with('flash_message', 'Location Deleted');
    }


    
}
