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
						<div class="form">
							<h4 class="tal"><span class="head">Y </span>our Bookings</h4>
	
	<br>					
 <div class="pull-right"> 
<a  href="{{ URL::to('downloadBookings/xls') }}"><button class="btn tal btn-success">Download Excel xls</button></a>
</div>
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>From</th>
										<th>To</th>
										<th>Bus</th>
										<th>Depart</th>
										<th>Time</th>
										<th>Status</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
   @if(!empty($bookings) && $bookings->count())
							 @foreach ($bookings as $link)
          
          
									<tr>
										<td>{{ $link->id }}</td>
										<td>  {{ $link->name }}</td>
										<td>  {{ $link->from }}</td>
										<td>  {{ $link->to }}</td>
										<td>  {{ $link->bus }}</td>
										<td>  {{ $link->depart }}</td>
										<td>  {{ $link->timein }}</td>
									    <td>  {{ $link->status }}</td>

									  

 <td> 
 	  @if( $link->status == 1 )
 	<a  class="pull-left" href="/bookings/{{ $link->id  }}" > <input type="button" class="btn" value="Cancel" ></a>
      @endif
 </td>										
			
			
									</tr>

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
