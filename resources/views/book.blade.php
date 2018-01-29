@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                            <h4><span class="head">S </span>earch</h4>
                            <form  action="/book" method="post">
                                     {!! csrf_field() !!}
                              

                                  <!--text field start-->
                                   <div class="form-group  col-md-6">
                        <label for="dateField" class="col-md-4 control-label">From </label>
                        <div class="col-md-8">
                            <select class="drop form-control" name="from" data-bvalidator="required">
                                    @if(!empty($locat) && $locat->count())
                             @foreach ($locat as $link)
                              <option value="{{ $link->location }}">{{ $link->location }}</option>
                             @endforeach 

                                    @else
            
        @endif
                                    </select>
                        </div>
                    </div>
                                <!--text field end-->

                                  <!--text field start-->
                                  <div class="form-group  col-md-6">
                        <label for="dateField" class="col-md-4 control-label">To </label>
                        <div class="col-md-8">
                            <select class="drop form-control" name="to" data-bvalidator="required">
                                    @if(!empty($locat) && $locat->count())
                             @foreach ($locat as $link)
                              <option value="{{ $link->location }}">{{ $link->location }}</option>
                             @endforeach 

                                    @else
            
        @endif
                                    </select>
                        </div>
                    </div>
                                <!--text field end-->


                                   <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Departure</label>
                                    <div class="col-md-8">
                                        <input class="date form-control" type="text" name="depart" placeholder="" data-bvalidator="required" >
                                    </div>
                                </div>
                                <!--text field end-->


                                 <!--text field start-->
                  

                                <!--text field end-->

                       

                                   <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Return</label>
                                    <div class="col-md-8">
                                        <input class="form-control chkk" value="false" type="checkbox" name="return" placeholder="" data-bvalidator="required" >
                                    </div>
                                </div>
                                <!--text field end-->

                                  



                               


                                <!--Submit Button Start-->

                                <div class="form-group  col-md-12">
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-used" value="Search">
                                    </div>
                                </div>

                                <!--Submit Button End-->



                            </form>
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bus</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Time</th>
                                        <th>Fare</th>
                                         <th>Return</th>
                                        <th>Book</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(!empty($val) && $val->count())
                             @foreach ($val as $links)
                              @foreach ($links->busses as $link)
          
          
                                    <tr>
                                        <td>{{ $link->id }}</td>
                                          
                                        <td>  {{ $link->BusIdentifier }}</td>

                                        <td>{{ $links->from }}</td>
                                            <td>{{ $links->to }}</td>
                                             <td>{{ $links->timein }}</td>




                                                 <td>{{ $links->fare }}</td>


                                                   <td>{{ $links->Ret }}</td>

                                        <td>  <a href="/booking/{{ $links->id  }}" > <input type="button" class="btn" value="Book" ></a></td>
            
                                    </tr>

                                   @endforeach 

                                    @endforeach 

                                    @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif

                                  
                                </tbody>
                            </table>
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



