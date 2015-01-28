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

}
