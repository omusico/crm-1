<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	* @return Object list()
	*/
	public function returnModelList($model, $column1, $column2, $orderByColumn = null) {
		return ($orderByColumn) ?	$model->orderBy($orderByColumn)->lists($column1, $column2):
									$model->lists($column1, $column2);
	}

	/**
	 *
	 *
	 */
	public function returnSelectValue($datas, $resource, $variable)
	{
		//return $datas[$resource][0]['contact_id'];
		$array = [];

		for($i = 0; $i < count($datas[$resource.'s']); $i++)
		{
			for($j = 0; $j < count($datas[$resource.'s'][$i]); $j++)
				//array_push($array, $datas[$resource][$i]['contact_id']);
				$array[$datas[$resource.'s'][$i][$resource.'_id']] = $datas[$resource.'s'][$i][$variable];
				//array_add($array, $datas[$resource.'s'][$i]['contact_id'], $datas[$resource.'s'][$i]['company_name']);
		}

		// foreach ($datas[$resource] as $data) {
		// 	array_add($array, $data['contact_id'], $data['company_name']);
		// }

		return $array;

		//return $data[$resource];
	}


}
