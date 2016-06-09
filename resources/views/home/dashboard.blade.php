@extends('layout/dashboard_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            @if($admin_info->admin_details != null)
              Welcome, {{$admin_info->admin_details->name}}
            @else
              Welcome, admin
            @endif
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Weekly Invoice Report</h3>
                    @if($admin_info->admin_details != null)
                      @if($admin_info->admin_details->membership == 1)
                        <div style="float: right;">You are a basic member <a href="#">Upgrade now</a></div>
                      @elseif($admin_info->admin_details->membership == 2)
                        <div style="float: right;">You are a pro member <a href="#">Upgrade now</a></div>
                      @else
                        <div style="float: right;">You are the gold member</div>
                      @endif
                    @else
                      <div style="float: right;">Not sure about your memebership</div>
                    @endif
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <p class="text-center">
                        <strong>Invoice: Of Last 7 Days Week</strong>
                      </p>
                      <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" style="height: 40%;"></canvas>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                    <!-- <div class="col-md-4">
                      <p class="text-center">
                        <strong>Goal Completion</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">Add Products to Cart</span>
                        
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                        </div>
                      </div>
                      <div class="progress-group">
                        <span class="progress-text">Complete Purchase</span>
                        
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: 100%"></div>
                        </div>
                      </div>
                      
                      
                    </div> --><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@stop