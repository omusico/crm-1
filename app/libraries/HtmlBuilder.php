<?php

class HtmlBuilder {

	/**
	 * Build client listing table rows.
	 *
	 * @param array $data
	 * @return string
	 */
	public function buildClientListingTableRows($clients)
	{
		$html = '';
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