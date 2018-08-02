<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use app\admin\Models\goods_type;
class ProductController extends Controller
{
    public function index()
    {	
    	//$m = Db::table('goods_type');
        /*$data = $m->field("*,concat(path,',',tid) as paths")->order('paths')->select();*/
        $data = Db::query("select *,concat(path,',',tid) as paths from goods_type order by paths");
        foreach($data as $k=>$v){
            $data[$k]['name'] = str_repeat("!---",$v['level']).$v['name'];//str_repeat() 函数把字符串重复指定的次数

        }
        return view('product/product',['data'=>$data]);
    }

    public function type(Request $req)
    {   
        //执行添加
        $data = $req -> post();
        if($data['name'] == ""){
            echo '<script>alert("分类名称不能为空");location.href="/admin/product/index";</script>';
            exit;
        }
        //接收的name和pid 必须等于 数据库的name和pid 
        $goods_type['name'] = $data['name'];
        //var_dump($goods_type['name']);
        $goods_type['pid'] = $data['pid'];
        //实例化数据库
        $m = Db::name('goods_type');

        if($goods_type['name'] != " " && $goods_type['pid'] != 0){
            //查找path路径(就是父类的路径)
            $path = $m->field("path")->find($goods_type['pid']);
            //$path['path']是path=0,1
            $goods_type['path'] = $path['path'];
            $goods_type['level'] = substr_count($goods_type['path'],",");
            //把输入的数据插入到数据库里
            //时间
            $goods_type['created_at'] = date('Y-m-d H:i:s', time());
            $res = $m->insertGetId($goods_type,$goods_type['created_at']);//insertGetId插入成功时会返回一个tid(自增的tid)
            //$goods_type['path'] + 自增的tid                     
            $path['path'] = $goods_type['path'].','.$res;
            //多少级的分类
            $path['level'] = substr_count($path['path'],",");
            //更新数据
            $res2 = $m->where('tid',$res)->update(['path'=>$path['path'],'level'=>$path['level']]);
        }else if($goods_type['name'] != " " && $goods_type['pid'] == 0){
            //$goods_type['pid'] == 0
            $goods_type['path'] = $goods_type['pid'];
            $goods_type['level'] = 1;
            //时间
            $goods_type['created_at'] = date('Y-m-d H:i:s', time());
            //把输入的数据插入到数据库里
            $res = $m->insertGetId($goods_type,$goods_type['created_at']);//insertGetId插入成功时会返回一个tid(自增的tid)
            //$goods_type['path'] + 自增的tid                     
            $path['path'] = $goods_type['path'].','.$res;
            //更新数据
            $res2 = $m->where('tid',$res)->update(['path'=>$path['path']]);
        }
        echo '<script>alert("添加成功");location.href="/admin/product/list";</script>';
        exit(); 
    }

    public function list()
    {   
        $all = goods_type::all();
        return view('product/list',['all'=>$all]);
    }

    public function ajax_type(Request $req)
    {
        //接收ajax传过来的数据
        $data = $req -> post();
        $tid = $data['tid'];
        $type_tid = Db::name('goods_type');
        $goods_type = Db::name('goods_type')->where('pid','=',$tid)->select();
        if($goods_type){
            $str = "当前类别下面有子分类不允许删除...";
            echo json_encode($str);
        }else{
            $res = $type_tid->where('tid','=',$tid)->delete();
            if($res){
                echo 1;
            }
        }
        
    }

    public function models()
    {
        // 根据主键获取多个数据
        $list = goods_type::all(); 
        echo '<pre>';
        var_dump($list);
        // 或者使用数组
        /*$list = goods_type::all([1,2,3]);
        foreach($list as $key=>$user){
            echo $user->name;
        }*/
    }
}
