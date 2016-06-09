@extends('layout.super-admin-master')
@section('content')
<div class="col-md-12">
   <div class="panel">
      <header class="panel-heading">
         all invoices
      </header>
      <div class="panel-body">
         <table class="table table-bordered">
            <tr>
               <th>Invoice #</th>
               <th>Invoiced To</th>
               <th>Created At</th>
               <th>Details</th>
               <th>Created By</th>
            </tr>
            @if(count($all_invoice) > 0)
            	@foreach($all_invoice as $invoice)
            	<tr>
	               <td>{{$invoice->invoice_id}}</td>
	               <td>{{$invoice->user_details->email}}</td>
	               <td>{{$invoice->created_at}}</td>
	               <td>
	               	<form action="{{ route('postInvoiceDetails') }}" method="post">
	               		<button type="submit" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i></button>
	               		<input type="hidden" name="_token" value="{{ Session::token() }}" />
	               		<input type="hidden" name="invoice_id" value="{{$invoice->invoice_id}}" />
	               	</form>
	               </td>
	               <td>{{$invoice->admin->email}}</td>
	            </tr>
            	@endforeach
            @else
            	<tr>
            		<div class="alert alert-warning">No Data Available</div>
            	</tr>
            @endif
         </table>
         <div class="table-foot">
            <ul class="pagination pagination-sm no-margin pull-right">
               {!! $all_invoice->render() !!}
            </ul>
         </div>
      </div>
      <!-- /.panel-body -->
   </div>
   <!-- /.panel -->
</div>
<!-- /.col -->
@endsection