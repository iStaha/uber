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
							<h4><span class="head">U </span>pdate Bus</h4>
							<form  action="{{ route('bus.update', $bus->id) }}" method="post">
  <input type="hidden" name="_method" value="PUT">
								     {!! csrf_field() !!}
								<!--text field start-->
								<div class="form-group  col-md-6">
									<label for="textField" class="col-md-4 control-label">Bus</label>
									<div class="col-md-8">
										<input id="textField" type="text" name="bus" placeholder="" data-bvalidator="required"  value="{{$bus->BusIdentifier}}" class="form-control">
									</div>
								</div>
								<!--text field end-->



								<!--Submit Button Start-->

								<div class="form-group  col-md-12">
									<div class="col-md-4">
										<input type="submit" class="btn btn-used" value="Update">
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
