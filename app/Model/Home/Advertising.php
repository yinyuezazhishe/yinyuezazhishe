<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'advertising';

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

	 static public function AdverTising($cates=[],$pid=0)
    {
        if(empty($cates)){
            $cates = self::all();
        }

        $arr = [];
        foreach($cates as $k=>$v){
            if ($v->pid==$pid){
                $v-> sub = self::AdverTising($cates,$v->id);
                $arr[] = $v;
            }
        }
        return $arr;
    }
}
