
Date.prototype.addDays = function(days)	{
    var dat = new Date(this.valueOf());
    dat.setDate(dat.getDate() + days);

    var yyyy = dat.getFullYear().toString();
    var mm = (dat.getMonth()+1).toString();
    var dd = dat.getDate().toString();

    return dd+'/'+mm+'/'+yyyy;    
}

getDueDate(parseInt($('select[name=due_date]').val()));

function getDueDate(days) {
	$date = new Date();
	$net = parseInt($('select[name=due_date]').val());

	$('.due_date').html($date.addDays($net));
}

$('select[name=due_date]').on("change", function() {
	getDueDate(parseInt($('select[name=due_date]').val()));

});

$('.discount-type').on('click', function(event){
	event.preventDefault;
	$(this).find();
    $sign = $(this).html().substr(0,1);
    $parentButtom = $(this).closest('ul').prev('.discount-dropdown');
    $newHtml = $sign + $parentButtom.html().substr(1);
    $parentButtom.html($newHtml);
    $('input[name=discount]').data('discount-type', $sign);
});

$('.add-invoice-item').on('click', function(event) {
	event.preventDefault();
	$itemNumber = parseInt($('.line-items').find('.item').length) + 1;
	$lineItem = getItemOptions(items, $itemNumber);
	$($lineItem).insertBefore('.items-footer');
	$('select[name=item-'+$itemNum+']').chosen();
});

function getItemDetails(itemNum)
{
	startHoldTight();

	$item_id = $('select[name=item-'+itemNum+']').val();
	$item_data = noReloadAjax('/items/'+$item_id, 'get', false);
	$item_data = $.parseJSON($item_data);
	$('body').find('input[name=rate-'+itemNum+']').val($item_data['rate'].toFixed(2));

	tallyItemAmount(itemNum);
	enableInputs(itemNum);
	stopHoldTight();
}

function tallyItemAmount(itemNum)
{
	var amount = $('body').find('.item-amount.amount-'+itemNum);
	
	var quantity = accounting.formatNumber( $('body').find('input[name=quantity-'+itemNum+']').val(), 2);
	console.log('quantity :' + quantity);
	
	var rate = accounting.formatNumber( $('body').find('input[name=rate-'+itemNum+']').val(), 2);
	console.log('rate :' + rate);
	
	var discount = accounting.formatNumber( $('body').find('input[name=discount-'+itemNum+']').val(), 2);
	console.log('discount :' + discount);
	
	var discountType = $('body').find('.discount-dropdown-'+itemNum).html().substr(0,1);
	
	
	
	var tax = accounting.formatNumber( $('body').find('select[name=tax-'+itemNum+']').val(), 2);

	
	console.log('tax :' + tax);

	var itemTotal = ((quantity == 0.00)? 0 : quantity)
					* ((rate == 0.00)? 0 : rate);

	if(discountType != '$') {// if % instead of $
		discount =  1 - (discount / 100) ;
		itemTotal = accounting.formatNumber( (itemTotal * discount), 2);
	}

	itemTotal = accounting.formatNumber( (itemTotal - discount), 2);

	console.log('value :' + accounting.formatNumber(itemTotal, 2));

	amount.html(accounting.formatNumber(itemTotal, 2));


}

function enableInputs(itemNum)
{
	var names = ['quantity', 'rate', 'discount'];
	for(var i = 0; i < names.length; i++)
	{
		$('body').find('input[name='+names[i]+'-'+itemNum+']').removeAttr('disabled');
	}
	$('body').find('select[name=tax-'+itemNum+']').removeAttr('disabled');
	$('body').find('.discount-dropdown-'+itemNum).removeAttr('disabled');	
}

function removeItem(itemNum) {
	$('body').find('.item.item-'+itemNum).remove();
}

function getItemOptions(items, itemNum) {
		$html =	'<div class="form-group item item-'+itemNum+'">';
	    	$html +=	'<span class="line-item-column item-details">';
	    		$html += '<select name="item-'+itemNum+'" onchange="getItemDetails('+itemNum+');" value class="form-control chosen-selected" ui-jq="chosen" required>';
	    		for (var key in items) {
				   	$html += '<option value="'+key+'">'+items[key]+'</option>';
				}				
	    		$html += '</select>';	    		
	    	$html += '</span>';
    		$html += '<span class="line-item-column item-quantity">';
    		$html += '<input name="quantity-'+itemNum+'" onblur="tallyItemAmount('+itemNum+');" value="1.00" type="text" class="form-control" disabled required />';
    		$html += '</span>';
    		$html += '<span class="line-item-column item-rate">';
    			$html += '<input name="rate-'+itemNum+'" onblur="tallyItemAmount('+itemNum+');" value="0.00" type="text" class="form-control" disabled required />';
    		$html += '</span>';
    		$html += '<span class="line-item-column item-discount">';
    			$html += '<div class="input-group">';
    				$html += '<input name="discount-'+itemNum+'" onblur="tallyItemAmount('+itemNum+');" value="0" type="text" class="form-control" data-discount-type="$" disabled required />';
				   	$html += '<div class="input-group-btn">';
				       	$html += '<button type="button" class="btn btn-default dropdown-toggle discount-dropdown discount-dropdown-'+itemNum+'" data-toggle="dropdown" disabled aria-expanded="false">$ <span class="caret"></span></button>';
				      	$html += '<ul class="dropdown-menu dropdown-menu-right discount-dropdown" role="menu">';
				       		$html += '<li><a class="discount-type">$</a></li>';
				      		$html += '<li><a class="discount-type">%</a></li>';
				       	$html += '</ul>';
				  	$html += '</div>';
				$html += '</div>';
    		$html += '</span>';
    		$html += '<span class="line-item-column item-tax">';
	    		$html += '<select name="tax-'+itemNum+'" class="form-control" disabled required>';
		    		$html += '<option value="0">None</option>';
		    		$html += '<option selected value="10">GST [10%]</option>';
		    	$html += '</select>';
    		$html += '</span>';
    		$html += '<span class="line-item-column item-amount amount-'+itemNum+' ta-right text-larger">';
				$html += '0.00';
    		$html += '</span>';
    		$html += '<span class="line-item-column">';
    			$html += '<a onclick="removeItem('+itemNum+')" class="item-remove"><i class="fa fa-remove"></i></a>';
    			$html += '</a>';
    		$html += '</span>';
    	$html += '</div>';
	
    	return $html;
}