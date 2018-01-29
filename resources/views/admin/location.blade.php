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
							<h4 class="tal"><span class="head">A </span>dd Location</h4>
							<form  action="/admin/location" method="post">
								     {!! csrf_field() !!}
								<!--text field start-->
								<div class="form-group  col-md-6">
									<label for="textField" class="col-md-4 control-label">Location</label>
									<div class="col-md-8">
										<input id="textField" type="text" name="loc" placeholder="" data-bvalidator="required"  value="" class="form-control">
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
  <div class="tal">
<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
</div>

<br> <br>
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Location</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
   @if(!empty($locat) && $locat->count())
							 @foreach ($locat as $link)
          
          
									<tr>
										<td>{{ $link->id }}</td>
										<td>{{ $link->location }}</td>

										<td>  <a class="btn" href="{{ route('location.edit', $link->id) }}/"> <i class="fa fa-edit"> </i>
										</a> 
		 {!! Form::open(['method' => 'DELETE','class' => 'tac', 'route' => ['location.destroy', $link->id] ]) !!}								 
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

									<tr> <td colspan="100" class="text-center">	{!! $locat->render() !!} </td></tr>
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
