<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class HomeUser extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'homeusers';

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
    //关联积分表
    public function integral(){
        return $this->hasOne('App\Model\Admin\Integral','hid','id');
    }
    //关联活动表
    public function activity(){
        return $this->hasMany('App\Model\Admin\AdminActivity','uid','id');
    }
}
