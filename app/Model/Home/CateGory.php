<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;
use DB;
class CateGory extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'category';

    //主键
    protected $primaryKey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];


    static public function getSubCates($cates=[],$pid=0)
    {
        if(empty($cates)){
            $cates = self::all();
        }

        $arr = [];
        foreach($cates as $k=>$v){
            if ($v->pid==$pid){
                $v-> sub = self::getSubCates($cates,$v->id);
                $arr[] = $v;
            }
        }
        return $arr;
    }

    /**
     *  获取此类别的列表
     *
     *  @return \Illuminate\Http\Response.
     */
    public function lists()
    {
        return $this->hasMany('App\Model\Admin\Lists', 'cid', 'id');
    }

}
