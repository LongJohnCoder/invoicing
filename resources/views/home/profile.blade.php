@extends('layout/home_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Profile
            <small>Preview</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
        @if(Session::has('status_msg'))
            <div class="alert alert-success">{{ Session::get('status_msg') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
            {{ Session::forget('status_msg')}}
        @endif
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Profile Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{ Form::open(array('url' => 'profilr_update', 'files'=>true)) }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      @if($Admincount!=0)
                    	{{ Form::hidden('id',$Admin->id,['class' => 'form-control profile_control', 'required' => 'required']) }}
                    	@else
                    	{{ Form::hidden('id','',['class' => 'form-control profile_control', 'required' => 'required']) }}
                    	@endif

                      @if($Admincount!=0)
                    	{{ Form::text('name',$Admin->name,['class' => 'form-control profile_control', 'required' => 'required']) }}
                    	@else
                    	{{ Form::text('name','',['class' => 'form-control profile_control', 'required' => 'required']) }}
                    	@endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Details</label>
                      @if($Admincount!=0)
                      {{ Form::textarea('details',$Admin->detail,['class' => 'form-control profile_control', 'required' => 'required']) }}
                      @else
                    	{{ Form::textarea('details','',['class' => 'form-control profile_control', 'required' => 'required']) }}
                    @endif
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputFile">Logo</label>
                      {!! Form::file('images', array('class'=>'add-image')) !!}
                       @if($Admincount!=0)
                       		@if($Admin->image!="")
                       		<img src="{{url('/')}}/public/admin_new/{{$Admin->image}}" style="background-color: currentColor;" >
                       		@else
                       		<img src="{{url('/')}}/public/imgx/logo.png" style="background-color: currentColor;" >
                       		@endif
                       @else
                       <img src="{{url('/')}}/public/imgx/logo.png" style="background-color: currentColor;" >
                       @endif
                      
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    
                    {{ Form::submit('Update',array('class' => 'btn btn-primary','id' => '')) }}
                  </div>
                {!! Form::close() !!}
              </div><!-- /.box -->

              <!-- Form Element sizes -->
              

              

              <!-- Input addon -->
              

            </div><!--/.col (left) -->
            <!-- right column -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection