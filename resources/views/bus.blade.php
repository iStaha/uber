@extends('layouts.use') @section('content')
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



          -              <!--Heading End -->
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
                            <h4 class="tal"><span class="head">A </span>dd Bus</h4>
                            <form  action="/admin/bus" method="post">
                                     {!! csrf_field() !!}
                                <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Bus</label>
                                    <div class="col-md-8">
                                        <input id="textField" type="text" name="bus" placeholder="" data-bvalidator="required" class="form-control">
                                    </div>
                                </div>
                                <!--text field end-->

                                 

                                  <!--text field start-->
                                <div class="form-group  col-md-6">
                                    <label for="textField" class="col-md-4 control-label">Seats</label>
                                    <div class="col-md-8">
                                        <input id="textField" type="number" name="seats" placeholder="" data-bvalidator="required" class="form-control">
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
  

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                         <th>Bus</th>
                                      
                                         <th>Seats</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
   @if(!empty($busses) && $busses->count())
                             @foreach ($busses as $bus)
          
          
                                    <tr>
                                        <td>{{ $bus->id }}</td>
                                         <td>{{ $bus->BusIdentifier }}</td>
                                         <td>  {{ $bus->seats }}</td>

                                     <td>  <a class="btn" href="{{ route('bus.edit', $bus->id) }}/"> <i class="fa fa-edit"> </i>
                                        </a> 
         {!! Form::open(['method' => 'DELETE','class' => 'tac', 'route' => ['bus.destroy', $bus->id] ]) !!}                              
             <a class=""> <i class="fa fa-trash"> </i></a>
 {!! Form::close() !!}
            </td>
            
                                    </tr>

                                    @endforeach 

                                    @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif

                                    <tr> <td colspan="100" class="text-center"> {!! $busses->render() !!} </td></tr>
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
