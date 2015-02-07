@extends('templates.main-template')
    @section('content')

	  <div class="wrapper-md" ng-controller="FormDemoCtrl">

	  	<div class="row">
	    <div class="col-sm-12">
	      <div class="panel panel-default">

	      	@include('partials.errors.validation')

	        <div class="panel-heading font-bold">Create New Incoice</div>
	        <div class="panel-body">
	          
	          <!-- row -->
	          <div class="row">
	          {{ Form::open(['action' => 'InvoicesController@store', 'class' => 'form-label-bold']) }}
	          	
	          	<!-- business details -->
	          	<div class="col-sm-8">
	          		<h3>New Invoice</h3>

	          		<div class="row">
	          			<div class="col-sm-8">

			          		<!-- client -->
				          	<div class="form-group">
					        	<label>Client:</label> <span class="text-danger">*</span></label>
					        	<div class="input-group m-b">
						        	{{ Form::select('client', $clients,
						        			$c, ['class' => 'form-control chosen-selected', 'ui-jq' => 'chosen', 'data-placeholder' => 'Select recipients...', 'required']) }}
						        	<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						        </div>
				          	</div>
				          	<!-- / client -->

				          	<div class="form-group">
					          	<label for="last_name">Due Date <span class="text-danger">*</span></label>
					          	<div class="input-group m-b">
					          		{{ Form::select('due_date', [
					          				'15' => 'Net 15',
					          				'30' => 'Net 30',
					          				'45' => 'Net 45',
					          				'60' => 'Net 60',
					          				'0'  => 'Due on Receipt'
					          				],
					        			'15', ['class' => 'form-control chosen-selected', 'ui-jq' => 'chosen', 'data-placeholder' => 'Select recipients...', 'required']) }}
					          		<span class="input-group-addon">
					          			<span class="glyphicon glyphicon-calendar"></span>
					          		</span>
					          	</div>
					          	<p class="pull-right font-bold text-info">Due Date: <span class="due_date"></span></p>
				          	</div>
				          	
				        </div>
				    </div>
				    
				    
				    <div class="form-group line-items">

				    	<div class="items-header">
				    		<span class="line-item-column item-details">Item Details</span>
				    		<span class="line-item-column item-quantity">Quantity</span>
				    		<span class="line-item-column item-rate">Rate</span>
				    		<span class="line-item-column item-discount">Discount</span>
				    		<span class="line-item-column item-tax">Tax</span>
				    		<span class="line-item-column item-amount ta-right">Amount</span>
				    	</div>

				    	<!-- item -->
				    	<div class="form-group item item-1">
				    		<span class="line-item-column item-details">
			    				{{ Form::select('item-1', $items,
					        			null, ['class' => 'form-control chosen-selected', 'ui-jq' => 'chosen', 'required', 'onchange' => 'getItemDetails(1);']) }}
				    		</span>
				    		<span class="line-item-column item-quantity">
			    				{{ Form::text('quantity-1', '1.00', ['class' => 'form-control', 'required', 'disabled', 'onblur' => 'tallyItemAmount(1);']) }}
				    		</span>
				    		<span class="line-item-column item-rate">
			    				{{ Form::text('rate-1', '0.00', ['class' => 'form-control', 'required', 'disabled', 'onblur' => 'tallyItemAmount(1);']) }}
				    		</span>
				    		<span class="line-item-column item-discount">
				    			<div class="input-group">
			    					{{ Form::text('discount-1', 0, ['class' => 'form-control', 'required', 'data-discount-type'=> '$', 'disabled', 'onblur' => 'tallyItemAmount(1);']) }}
								   	<div class="input-group-btn">
								       	<button type="button" class="btn btn-default dropdown-toggle discount-dropdown discount-dropdown-1" data-toggle="dropdown" disabled aria-expanded="false">$ <span class="caret"></span></button>
								      	<ul class="dropdown-menu dropdown-menu-right discount-dropdown" role="menu">
								       		<li><a class="discount-type">$</a></li>
								      		<li><a class="discount-type">%</a></li>
								       	</ul>
								  	</div>
								</div>
				    		</span>
				    		<span class="line-item-column item-tax">
			    				{{ Form::select('tax-1', ['0' => 'None', '10' => 'GST [10%]'],
			    						'10', ['class' => 'form-control', 'required', 'disabled']) }}
				    		</span>
				    		<span class="line-item-column item-amount amount-1 ta-right text-larger">
			    				0.00
				    		</span>
				    		<span class="line-item-column not-active">
				    			<a class="item-remove"><i class="fa fa-remove"></i></a>
				    			</a>
				    		</span>
				    	</div>
				    	<!-- / item -->

				    	<div class="items-footer">
					    	<a class="text-info add-invoice-item">+ Add another item</a>
					    </div>

			    	</div>

			    	<div class="col-md-5 col-md-offset-7">

			    		<div class="row form-group line-items-subsection">

			    			<div class="section line-item-subtotal">
			    				<span class="col-sm-9 text-larger subtotal-label">Sub Total ($)</span>
			    				<span class="col-sm-3 text-larger ta-right subtotal-value">0.00</span>
				    		</div>

				    		<div class="section line-item-tax">
			    				<span class="col-sm-9 text-larger subtotal-label">Tax($)</span>
			    				<span class="col-sm-3 text-larger ta-right subtotal-value">0.00</span>
				    		</div>

				    		<!-- <div class="section line-item-adjustment">
			    				<span class="col-sm-4 text-larger adjustment-label">Adjustment</span>
			    				<span class="col-sm-5 text-larger adjustment-amount">
			    					{{ Form::text('adjustment', null, ['class' => 'form-control']) }}
			    				</span>
			    				<span class="col-sm-3 text-larger ta-right adjustment-value">0.00</span>
				    		</div> -->

				    		<div class="section line-item-total">
			    				<span class="col-sm-9 text-larger total-label">Total ($)</span>
			    				<span class="col-sm-3 text-larger ta-right total-value">0.00</span>
				    		</div>


				    	</div>

			    	</div>



				</div>
				    <!-- / row -->

			    	
			    	
			    
			    

	          	<div class="col-sm-12">
	          		<a href="{{ action('InvoicesController@store') }}" class="btn btn-md btn-default">Cancel</a>
	          		{{ Form::submit('Save and Send', ['class' => 'btn btn-md btn-danger']) }}
	          		{{ Form::submit('Save as Draft', ['class' => 'btn btn-md btn-default']) }}
	          	</div>

	          {{ Form::close() }}
	          </div>
	          <!-- / row -->
	        </div>

	      </div>
	    </div> 
	  </div>

	  </div>
	  <script>
	  	var items = {{ json_encode($items) }};	  		
	  </script>
	  	
@stop