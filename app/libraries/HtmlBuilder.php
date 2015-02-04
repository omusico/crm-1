<?php

class HtmlBuilder {

	/**
	 * Build client listing table rows.
	 *
	 * @param array $clients
	 * @return string
	 */
	public function buildClientListingTableRows($clients)
	{
		$html = '';

		if(count($clients) < 1)
		{
			return $html .= '<p>There are no clients to list.</p>';
		}
		else
		{			
			foreach ($clients as $client) {
				$html .= '
					<tr>
		            	<td><a href="/clients/'.$client['contact_id'].'">'.$client['contact_name'].'</a></td>
		            	<td><a href="/clients/'.$client['contact_id'].'">'.$client['first_name'].' '.$client['last_name'].'</a></td>
		            	<td><a href="/clients/'.$client['contact_id'].'">'.$client['email'].'</a></td>
		            	<td><a href="/clients/'.$client['contact_id'].'">'.$client['phone'].'</a></td>
		            	<td><a href="/clients/'.$client['contact_id'].'">'.DateClass::formatDate($client['created_time'], 'jS M Y').'</a></td>';
		            	($client['status'] === 'active')? 
		            		$html .= '<td><a href="/clients/'.$client['contact_id'].'"><span class="label bg-success">'.ucfirst($client['status']).'</a></span></td>': 
		            		$html .= '<td><a href="/clients/'.$client['contact_id'].'"><span class="label bg-danger">'.ucfirst($client['status']).'</a></span></td>';
			        $html .= '</tr>
				';
			}
			return $html;
		}
	}


	/**
	 * Build item listing table rows.
	 *
	 * @param array $items
	 * @return string
	 */
	public function buildItemListingTableRows($items)
	{
		// $html = '';

		// if(count($items) < 1)
		// {
		// 	return $html .= '<p>There are no items to list.</p>';
		// }
		// else
		// {			
		// 	foreach ($items as $item) {
		// 		$html .= '
		// 			<tr>
		//             	<td><a href="/items/'.$item['item_id'].'">'.$item['name'].'</a></td>
		//             	<td><a href="/items/'.$item['item_id'].'">'.$item['description'].'</a></td>
		//             	<td><a href="/items/'.$item['item_id'].'">$'.$item['rate'].'</a></td>';
		//             	($item['status'] === 'active')? 
		//             		$html .= '<td><a href="/items/'.$item['item_id'].'"><span class="label bg-success">'.ucfirst($item['status']).'</a></span></td>': 
		//             		$html .= '<td><a href="/items/'.$item['item_id'].'"><span class="label bg-danger">'.ucfirst($item['status']).'</a></span></td>';
		// 	        $html .= '
		// 	        	<td><a href class="btn btn-sm btn-info edit-item-link" data-item-id="'.$item['item_id'].'" data-toggle="modal" data-target="#updateItemModal">Edit</a></td>
		// 	       	</tr>
		// 		';
		// 	}
		// 	return $html;
		// }
	}


	/**
	 * Build html error respsonse
	 *
	 * @param array $validatorErrors
	 * @return string
	 */
	public function buildValidatorErrorResponseHtml($validatorErrors)
	{
		$html = '<h3>Validation Errors</h3>';

		if(is_array($messages = $validatorErrors->all()))
		{
			foreach ($messages as $message)
			{
			    $html .= '<p>'.$message.'</p>';
			}
		}
		else
		{
			$html .= '<p>'.$validatorErrors.'</p>';
		}
		
		return $html;
	}	
}