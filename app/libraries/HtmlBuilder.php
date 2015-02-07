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
	 * Build client invoice table rows.
	 *
	 * @param array $invoices
	 * @return string
	 */
	public function buildClientInvoiceTableRows($invoices)
	{
		$html = '';

		if(count($invoices) < 1)
		{
			return $html .= '<p>There are no invoices to list.</p>';
		}
		else
		{			
			foreach ($invoices as $invoice) {
				$html .= '
					<tr>
		            	<td><a href="{{ url("/invoices/'.$invoice['invoice_id'].'") }}">'.$invoice['invoice_number'].'</a></td>
		                <td>'.date("d/m/Y", strtotime($invoice['created_time'])).'</td>
		                <td>'.date("d/m/Y", strtotime($invoice['due_date'])).'</td>
		                <td>'.$invoice['total'].'</td>
		                <td>'.$invoice['balance'].'</td>
		                <td>'.ucfirst($invoice['status']).'</td>
		                <td>
		                    <a href="{{ url("/invoices/'.$invoice['invoice_id'].'") }}" class="btn btn-sm btn-info edit-invoice-link" data-invoice-id="" data-toggle="modal" data-target="#updateinvoiceModal">Edit</a>
		                    <a href class="btn btn-sm btn-danger edit-invoice-link" data-invoice-id="" data-toggle="modal">PDF</a>
		                </td>
			       	</tr>
				';
			}
			return $html;
		}
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