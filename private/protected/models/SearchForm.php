<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SearchForm extends CFormModel
{
	var $search_criteria;
	var $search_field;
	var $search_criteria1;
	var $search_field1;
	var $search_criteria2;
	var $search_field2;
	var $start_date;
	var $end_date;

	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('start_date, end_date, search_criteria1, search_field1, search_criteria2, search_field2' ,'required'),

			
			
		);
	}


	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'search_criteria'=>'Search criteria',
			'search_field'=>'Search field',
			'search_criteria1'=>'Search criteria 1',
			'search_field1'=>'Search field',
			'search_criteria2'=>'Search criteria 2',
			'search_field2'=>'Search field',
			'start_date'=>'Start Date',
			'end_date'=>'End Date',
		);
	}


	

	
}
