<?php

/**
* openTable API Class
* API Documentation: http://www.zomato.com/api/documentation
* Class Documentation: https://github.com/bhaskar-rabha/api-zomato/tree/dev/
*
* @author Roshan Lal
* @since 27 sep, 2016
* @copyright  - DesignersX chandigarh
* @version 1
* @license BSD http://www.opensource.org/licenses/bsd-license.php
**/

class openTable {
	
	/**
	* The API base URL
	*/
	private $_baseUrl 	= 'https://opentable.herokuapp.com/api';
	
	/**
	* Store Error
	*
	*@var array
	*/
	
	
	public function __call($method, $args)
	{      
		
        if(method_exists($this,$method))
        {
        	return call_user_func_array(array($this, $method), $args);	
        }
        else
        {
        	echo 'Method Does Not exist';
        }
       
    }
	
	/**
	*	[where description]
	* 	@param 	name 		summary 							type 			required
	*	        arrWhere	Prepare the Params for request		Array String	required				
	*  	@return string
	**/
	
	private function where($arrWhere = array())
	{
		$query = '';
		foreach($arrWhere as $key=>$value)
		{
			if(!empty($value) && $value !== 0)
			{
				if(empty($query))
				{
					$query = '?'.$key .'='. $value;
				}
				else
				{
					$query .= '&'.$key .'='. $value;	
				}
			}
		}
		return $query;
	}
	private function getRequest($url)
	{
		
		$ch = curl_init($url);
		$timeout = 5; // set to zero for no timeout
		curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch);		
		curl_close($ch);
		return $result;
	}
	
	
	/**
	*	[getAllCity description]
	* 	@param 	name 	method 	summary type 	required
	*	        None	None	None	None	None
	*  @return xml/json      xml or json depend on the $this->_dataformat;
	**/
	function getAllCity()
	{
		$url =  $this->_baseUrl . '/cities';
		return $retResult = $this->getRequest($url);
		
	}
	/**
	*	[getAllCountries description]
	* 	@param 	name 	method 	summary type 	required
	*	        None	None	None	None	None
	*  @return xml/json      xml or json depend on the $this->_dataformat;
	**/
	function getAllCountries()
	{
		$url =  $this->_baseUrl . '/countries';
		return $retResult = $this->getRequest($url);
		
	}
	/**
	*	[getAllCountries description]
	* 	@param 	name 	method 	summary type 	required
	*	        None	None	None	None	None
	*  @return xml/json      xml or json depend on the $this->_dataformat;
	**/
	function searchRestaurants($q = array())
	{
		
		$where = $this->where($q);
		$url =  $this->_baseUrl . '/restaurants'. $where;
		return $retResult = $this->getRequest($url);
	}
	
	/**
	*	[getAllCountries description]
	* 	@param 	name 	method 	summary type 	required
	*	        None	None	None	None	None
	*  @return xml/json      xml or json depend on the $this->_dataformat;
	**/
	function getAllStats()
	{
		$url =  $this->_baseUrl . '/stats';
		return $retResult = $this->getRequest($url);
		
	}
	
	function getRestrauntById($id = null) {
		
		if ($id === null) {
			echo 'Please provide restruant Id';
			die();
		} 
		$url =  $this->_baseUrl . '/restaurants/'.$id;
		return $retResult = $this->getRequest($url);
	}
}

?>