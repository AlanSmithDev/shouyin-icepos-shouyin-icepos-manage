<?php
/**
 * api_webservice表
 */
namespace model;
use think\Db;

class ApiWebservice extends BaseModel
{
	
	protected $pk='id';
	protected $name="api_webservice";
	
    public function getAll()
    {
        return $this->select();
    }

    public function getInfoByUserNameAndPassowrd($username, $password)
    {
    	return Db::table($this->table)
    	->field("*")
    	->where("username='$username' and <REDACTED_SECRET> and auth_expires_end >= now() and status='1'")
    	->select();
    }

    public function testFunc()
    {
    	
    }
}
