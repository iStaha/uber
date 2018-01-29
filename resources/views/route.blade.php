@extends('layouts.use') @section('content')
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
                        <div class="form">
                            <h4 class="tal"><span class="head">A </span>dd Route</h4>
                            <form  action="/admin/route" method="post">
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
                            <select class="drop form-control"  name="to" data-bvalidator="required">
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
                        <label for="dateField" class="col-md-4 control-label">Bus </label>
                        <div class="col-md-8">
                            <select class="drop form-control"  name="bu" data-bvalidator="required">
                                       @if(!empty($buss) && $buss->count())
                             @foreach ($buss as $link)
                              <option value="{{ $link->BusIdentifier}}">{{ $link->BusIdentifier }}</option>
                             @endforeach 

                                    @else
            
        @endif
                                    </select>
                        </div>
                    </div>
                                <!--text field end-->


                                  <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Time </label>
                                    <div class="col-md-8">
                                        <input id="textField" type="text" name="timein" placeholder="" data-bvalidator="required" class="form-control time">
                                    </div>
                                </div>
                                <!--text field end-->


                                  <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Depart</label>
                                    <div class="col-md-8">
                                        <input class="date form-control" type="text" name="depart" placeholder="" data-bvalidator="required" >
                                    </div>
                                </div>
                                <!--text field end-->

                                   <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Return</label>
                                    <div class="col-md-8">
                                        <input class="form-control chk" value="false" type="checkbox" name="return" placeholder="" data-bvalidator="required" >
                                    </div>
                                </div>
                                <!--text field end-->

                                     <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Duration</label>
                                    <div class="col-md-8">
                                        <input id="textField" type="text" name="duration" placeholder="" data-bvalidator="required" class="form-control">
                                    </div>
                                </div>
                                <!--text field end-->

                                    <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Fare</label>
                                    <div class="col-md-8">
                                        <input id="textField" type="number" name="fare" placeholder="" data-bvalidator="required" class="form-control">
                                    </div>
                                </div>
                                <!--text field end-->



                               


                                <!--Submit Button Start-->

                                <div class="form-group  col-md-12">
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-used" value="Submit">
                                    </div>
                                </div>

                                <!--Submit Button End-->



                            </form>
  



                            <table class="table table-striped ">
                                <thead  >
                                    <tr>
                                        <th>#</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Departure</th>
                                        <th>Time</th>
                                        <th>Bus</th>
                                        <th>Duration</th>
                                       <!--  <th>Action</th> -->
                                        
                                    </tr>
                                </thead>
                                <tbody>
   @if(!empty($rout) && $rout->count())
                             @foreach ($rout as $key => $links)

                           
             
                         @foreach ($links->busses as $link)          
          
                                    <tr>
                                        <td>{{ $links->id }}</td>
                                        <td>  {{ $links->from }}</td>
                                        <td>  {{ $links->to }}</td>
                                        <td>  {{ $links->Depart }}</td>
                                        <td>  {{ $links->timein }}</td>
                                        <td>  {{ $link->BusIdentifier }} </td>
                                        <td>  {{ $links->Duration}}</td>

                                   <!--      <td>  <a href=""> <i class="fa fa-trash"> </i></a></td> -->
            
                                    </tr>
  
   @endforeach 
                                    @endforeach 

                                    @else
            <tr>
                <td colspan="10">There is no data.</td>
            </tr>
        @endif

                                    <tr> <td colspan="100" class="text-center"> {!! $rout->render() !!} </td></tr>
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



