<?php
namespace app\admin\Models;

use think\Model;

class goods_type extends Model
{
    public $table = 'goods_type';
    public $primaryKey = 'tid';
    protected $autoWriteTimestamp = true;
    protected $resultSetType = 'collection';
}
		
