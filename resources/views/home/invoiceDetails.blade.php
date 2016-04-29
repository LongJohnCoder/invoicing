@extends('layout/home_template')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Invoices
      </h1>   
    </section>
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Basic info</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th>Invoice #</th>
                <th>Name</th>
                <th>Email</th>
                <th>Items x Quantity</th>
                <th>Tax Rate(%)</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Payment Status</th>
                <th>Payment Date</th>
              </tr>
              @foreach($user_details as $user)
              <tr>
                <td>
                  {{$user->invoice_id}}
                </td>
                <td>
                  {{$user->user_details->name}}
                </td>
                <td>
                  {{$user->user_details->email}}
                </td>
                <td>
                @foreach($user->invoice_items as $items)
                  <button class="btn btn-default" style="margin-bottom: 10px;">{{ $items->name }} x {{ $items->qty}}</button>
                @endforeach
                </td>
                <td>
                  {{ $user->tax_rate }}
                </td>
                <td>
                  {{ $user->total = $user->total+ ($user->total*($user->tax_rate/100)) }} 
                </td>
                <td>
                  {{date(" F j,Y ", strtotime($user->created_at))}}
                </td>
                <td>
                @if ($user->payment_status == 0)
                  Pending
                @else
                  Paid up
                @endif
                </td>
                <td>
                  @if($user->payment_status == 0)
                    Not Yet Paid
                  @else
                    {{ date(" F j,Y ", strtotime($user->updated_at)) }}
                  @endif
                </td>
              </tr>
              @endforeach
            </table>
          </div><!-- /.box-body -->
        </div>
      </div>
    </section>
  </div>
@endsection