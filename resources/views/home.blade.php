@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


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

        <div class="content">
                <div class="title m-b-md">
                   Uber
                </div>

                <div class="links">
                    <a href="#">Profits  : @if(!empty($price) ) {{ $price }} @endif </a>
                    <a href="#">Booked Seats  : @if(!empty($seats) ) {{ $seats }}  @endif</a>
                    <a href="#">Empty Seats :  @if(!empty($capacity) ){{ $capacity }}  @endif </a>
                   
                  
                </div>
            </div>
              <hr>              

                        <div class="form tal">
                            <h4><span class="head">S </span>earch</h4>
                            <br> <br> 
                            <form  action="/home" method="post">
                                     {!! csrf_field() !!}
                                <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Date</label>
                                    <div class="col-md-8">
                                        <input id="textField" type="text" name="date" placeholder="" data-bvalidator="required"  value="" class=" date form-control">
                                    </div>
                                </div>
                                <!--text field end-->



                                <!--Submit Button Start-->

                                <div class="form-group  col-md-6">
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-used" value="Submit">
                                    </div>
                                </div>

                                <!--Submit Button End-->



                            </form>


<br> <br> <br>

@if(!empty($val) && $val->count())

                            <div class="pull-left">
   {!! Form::open(['url' => 'downloadE/xls', 'method' => 'post'])  !!}                                
         <input  type="hidden" name="dat"  value="" class="excel" >  
           <button class="btn btn-success clearfix">Download Excel</button>
 {!! Form::close() !!}


 </div>

<br> <br> <br>

 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Date</th>
                                        <th>Profit</th>
                                        <th>Seats</th>
                                        <th>Booked Seats</th>
                                        <th>Bus</th>
                                        <th>Time</th>
                                      
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
  
                             @foreach ($val as $key => $link)
                         @foreach ($link->busses as $lin)          
          
                                    <tr>
                                        <td><!-- {{ $val[$key]->busses[0] }} -->{{ $link->id }}</td>
                                        <td>  {{ $link->from }}</td>
                                        <td>  {{ $link->to }}</td>

                                         <td>  {{ $link->Depart }}</td>

                                            <td>  {{ $link->profit}}</td>

                                             <td>{{ $val[$key]->busses[0]->seats }}</td>
                                              <td>{{ $link->seats_booked }}</td>
                                              <td>{{$lin->BusIdentifier }}</td>
                                                <td>{{ $link->timein }}</td>

                                        
            
                                    </tr>
   @endforeach 
                                    @endforeach 

                                   

                                    
                                </tbody>
                            </table>

                             @else
           
        @endif
                        
                        </div>

                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
