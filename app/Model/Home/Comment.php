<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'discuss';

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

    /**
     * 获得评论的用户信息。
     */
    public function users()
    {
        return $this->belongsTo('App\Model\Home\HomeUser','hid','id');
    }
}
