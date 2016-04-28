@extends('layout/home_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Invoice
            
          </h1>
          
        </section>
        <form action="{{ route('create-invoice') }}" method="POST">
        <!-- Main content -->
          <section class="content">
            <div class="row">
              
              <!-- right column -->
              <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Details</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <div class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-8 control-label">Client Invoice link is :<a href="{{url('/').'/client/invoice/'.$id}}">{{url('/').'/client/invoice/'.$id}}</a></label>
                        
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-6 control-label">The Invoice Link Have Been Sent To The Client Email ID</label>
                        
                      </div>
                      
                    </div><!-- /.box-body -->
                    
                  </div>
                </div><!-- /.box -->
                
  	          
  	          
              </div><!--/.col (right) -->
            </div>   <!-- /.row -->
          </section><!-- /.content -->
        </form>
      </div><!-- /.content-wrapper -->
@stop