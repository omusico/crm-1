
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
    $sign = $(this).html().substr(0,1);
    $parentButtom = $(this).closest('ul').prev('.discount-dropdown'); //this isn't working
    $newHtml = $sign + $parentButtom.html().substr(1);
    $parentButtom.html($newHtml);
    $('input[name=discount]').data('discount-type', $sign);
    //alert($('input[name=discount]').data('discount-type'));
});

$('.add-invoice-item').on('click', function(event) {
	event.preventDefault();
	$itemNumber = parseInt($('.line-items').find('.item').length) + 1;
	$items = getItemOptions(items);
	console.log($items);
});

function getItemOptions(items) {
	$newItem = JSON.stringify(items);
	$newItem = $newItem.substr(1, $newItem.length - 2);
	$arr = $newItem.replace(/"/g, '').split(',');
	$propArr = [];
	$html = '';
	for($i = 0; $i < $arr.length; $i++)	{
		$split = $arr[$i].split(':');
		$html += '<option value="'+ $split[0] +'">'+ $split[1] +'</option>';
	}
	return $html;
}
	

function getNewElement(itemNumber, jsonData) {}