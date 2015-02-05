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
	public function returnSelectValue($data, $resource, $var, $additionalVar = null)
	{
		$array = [];

		for($i = 0; $i < count($data[$resource.'s']); $i++)
		{
			for($j = 0; $j < count($data[$resource.'s'][$i]); $j++)
			{
				if($additionalVar === null)
				{
					$array[$data[$resource.'s'][$i][$resource.'_id']] = $data[$resource.'s'][$i][$var];
				}
				else
				{
					$array[$data[$resource.'s'][$i][$resource.'_id']] = $data[$resource.'s'][$i][$var].' - '.$data[$resource.'s'][$i][$additionalVar];
				}
			}
		}

		return $array;
	}


}
