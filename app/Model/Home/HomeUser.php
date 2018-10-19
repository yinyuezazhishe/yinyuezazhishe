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

    //模型关联：获取该用户所属的留言
    public function message()
    {
        return $this->hasMany('App\Model\Home\HomeUser', 'user_id', 'id');
    }
}
