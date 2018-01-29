@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->



                    <div class="content">



                        <!--Heading End -->
                        <!--Form Start -->
                        @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 @if(Session::has('flash_message'))
                 
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            
        @endif 
                        <div class="form tal">
                            <h4><span class="head">B </span>ook</h4>
                        <form  action="/booking" method="post">  
        <!--       <form  action="/pay" method="get">  -->
                                     {!! csrf_field() !!}
                              



                      <!--text field start-->
                     <div class="form-group  col-md-6">
                   <label for="textField" class="col-md-4 control-label">Name</label>
                   <div class="col-md-8">
                  <input class="form-control" type="text" name="name" placeholder="" value="{{$name}}" data-bvalidator="required" ></div>
                    </div>
                                <!--text field end-->

                                  <!--text field start-->
                                   <div class="form-group  col-md-6">
                        <label for="dateField" class="col-md-4 control-label">From </label>
                        <div class="col-md-8">
                          
                                    @if(!empty($route) )
                           
                            

                               <input class="form-control" type="text" name="from" placeholder="" value="{{$route->from}}" data-bvalidator="required" >
                           

                                    @else
            
        @endif
                                  
                        </div>
                    </div>
                                <!--text field end-->

                                  <!--text field start-->
                                  <div class="form-group  col-md-6">
                        <label for="dateField" class="col-md-4 control-label">To </label>
                        <div class="col-md-8">
                           
                              @if(!empty($route) )
                           
                            <input class="form-control" type="text" name="to" placeholder="" value="{{$route->to}}" data-bvalidator="required" >
                           

                                    @else
            
        @endif
                                    
                        </div>
                    </div>
                                <!--text field end-->


                                   <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Departure</label>
                                    <div class="col-md-8">
                                        <input class="date form-control" type="text" value="{{$route->Depart}}" name="depart" placeholder="" data-bvalidator="required" >
                                    </div>
                                </div>
                                <!--text field end-->


                                   <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Time</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" value="{{$route->timein}}" name="timein" placeholder="" data-bvalidator="required" >
                                    </div>
                                </div>
                                <!--text field end-->



                                 <!--text field start-->
                                   <div class="form-group  col-md-6">
                        <label for="dateField" class="col-md-4 control-label">Bus </label>
                        <div class="col-md-8">
                           

                              @if(!empty($bs) )
                           
                          <input class="form-control" type="text" name="bu" placeholder="" value="{{$bs}}" data-bvalidator="required" >
                           

                                    @else
            
        @endif
                                 
                        </div>
                    </div>


                                <!--text field end-->
<div class="form-group  col-md-6"><label for="textField" class="col-md-4 control-label">Time Return</label><div class="col-md-8"> <input class="form-control" value="{{$route->timereturn}}" type="text" name="timereturn" placeholder=""> </div> </div>
                       

                                   <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Return 
                                     </label>
                                    <div class="col-md-8">
                                        <input class="form-control chkk" value=" {{ $boo }}" type="checkbox" name="return" placeholder="" data-bvalidator="required" >
                                    </div>
                                </div>
                                <!--text field end-->

                                  



                               
<span class="token keyword">use</span> <span class="token package">Tzsk<span class="token punctuation">\</span>Payu<span class="token punctuation">\</span>Facade<span class="token punctuation">\</span>Payment</span><span class="token punctuation">;</span>


                                <!--Submit Button Start-->

                                <div class="form-group  col-md-12">
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-used" value="Book">
                                    </div>
                                </div>

                                <!--Submit Button End-->



                            </form>
                      
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <!--Form End -->




                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection



