<?php

namespace App\Models;

use Softhub99\Zest_Framework\Database\Db as Model;
use Config\Database;
use Softhub99\Zest_Framework\Session\Session;

class Community extends Model
{	
	/* 
	* Store database name
	*/
	protected static $db_name = Database::MYSQL_NAME;
	/* 
	* Store database table name
	*/
	protected static $db_tbl = 'community';
	
	public function pageCreate($title,$shortContent,$type,$content)
	{	
		
		$db = new Model;
		$slug = \Softhub99\Zest_Framework\Site\Site::salts(7);
		$token = \Softhub99\Zest_Framework\Site\Site::salts(15);
		$result = $db->insert(static::$db_tbl,static::$db_name,[
            'ownerId' => \App\Models\Account::loginUser()[0]['id'],
			'title' => $title,
			'type' => $type,
			'scontent' => $shortContent,
			'content' => $content,
			'created' => time(),
			'updated' => 0,
			'views' => 0,
			'isDelete' => null,
			'slug' => $slug,
			'token' => $token,
		]);
		$db->close();
		return $result;
	}
    public function communityWhere($where,$value)
    {
    	$db = new Model;
    	$result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'wheres' => ["{$where} ="."'{$value}'"]]);
    	$db->db()->close();
    	return $result;
    }  	
    public function viewLimitedCommunity($limit,$offset)
    {
    	$db = new Model;
    	$result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'limit' => ['start' => $limit , 'end' => $offset],]);
    	$db->db()->close();
    	return $result;    	
    }     
    public function isCommunity($slug)
    {
        $db = new Model;
        $result = $db->db()->count(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'wheres' => ['slug ='."'{$slug}' AND type = 'blog'"]]);
        $db->db()->close();
        return $result;
	}
	public function ref_format($str, $step, $reverse = false) {
		if ($reverse) {
		return strrev(chunk_split(strrev($str), $step, '-'));
	} else {
		return chunk_split($str, $step, '-');
	}
}	
}
