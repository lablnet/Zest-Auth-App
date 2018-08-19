<?php

namespace App\Models;

use \Zest\Database\Db as Model;
use Config\Database;

class Site extends Model
{	
	/* 
	* Store database name
	*/
	protected static $db_name = Database::MYSQL_NAME;
	/* 
	* Store database table name
	*/
	protected static $db_tbl = 'sitesetting';
    public function siteUpdate($value,$id)
    {
    	$db = new Model;
    	$result = $db->db()->update(['table'=>static::$db_tbl,'db_name'=>static::$db_name,'columns'=>['value'=>$value],'wheres' => ['id ='.$id]]);
    	$db->db()->close();
    	return $result;
	}
	/**
	 * Return all site settings.
	 *
	 * @return array
	 */		
    public function get()
    {
    	$db = new Model;
		$result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl]);
		$db->db()->close();
		return $result;
	}	
}
