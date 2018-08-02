<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\Models\shop_goods;
use think\Db;
class GoodsController extends Controller
{
    public function index()
    {
        return view('goods/index');
    }
    //显示添加商品页面
    public function list()
    {	
    	//显示全部
    	$data = Db::query("select *,concat(path,',',tid) as paths from goods_type order by paths");
        foreach($data as $k=>$v){
            $data[$k]['name'] = str_repeat("!---",$v['level']).$v['name'];//str_repeat() 函数把字符串重复指定的次数

        }
    	return view('goods/list',['data'=>$data]);
    }
    //执行添加
    public function add(Request $req)
    {
    	$data_form = $req -> post();
        //===========path(pid,tid)=============
    	$tid = explode(",", $data_form['tid']);
    	$data['tid'] = $tid['0'];
        if(!isset($tid['1'])){
            echo '<script>alert("请添加商品分类名称");location.href="list";</script>';
            exit;
        }
        $data['tpid'] = $tid['1'];
        //=====================================
    	$data['gname'] = $data_form['gname'];//商品名称
    	$data['unit'] = $data_form['unit'];//商品排序
    	$data['number'] = $data_form['number'];//商品编号
    	$data['barcode'] = $data_form['barcode'];//条形码
    	$data['reorder'] = $data_form['reorder'];//商品排序
    	$data['curprice'] = $data_form['curprice'];//现价
    	$data['oriprice'] = $data_form['oriprice'];//市场价
    	$data['cosprice'] = $data_form['cosprice'];//成本价
    	$data['inventory'] = $data_form['inventory'];//库存量
    	$data['restrict'] = $data_form['restrict'];//限制购买量
    	$data['already'] = $data_form['already'];//已经购买量
    	$data['freight'] = $data_form['freight'];//运费
    	$data['text'] = $data_form['text'];//商品描述
    	/*if(empty($data_form['enum'])){
    		echo '<script>alert("请添加商品属性");location.href="list";</script>';
    	}
    	if(isset($data_form['status']) == null){
			echo '<script>alert("请添加商品状态");location.href="list"</script>';
    	}*/
		$data['attributes'] = $data_form['enum'];
		$data['status'] = $data_form['status'];
		$shop_goods = new shop_goods;/*Db::table('shop_goods')*/;
		$res = 1;
		if($res == 1){
            $shop_goods->save($data);
			$this->success("添加商品成功",'list','',2);
		}else{
			$this->error("添加失败",'list','',2);
		}
    }
    
}