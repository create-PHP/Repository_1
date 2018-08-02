<?php
namespace app\admin\Models;
use think\Model;

class shop_goods extends Model
{
    public $table = 'shop_goods';
    public $primaryKey = 'gid';
    protected $autoWriteTimestamp = 'datetime';
    protected $resultSetType = 'collection';
}