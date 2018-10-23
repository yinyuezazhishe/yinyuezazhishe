<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'lists';

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
     * 获得此列表的详情
     */
    public function details()
    {
        return $this->hasOne('App\Model\Admin\Details', 'lid', 'id')->where('status', '<>', '1');
    }

    /**
     *  获取此列表的类别
     *
     *  @return \Illuminate\Http\Response.
     */
    public function category()
    {
        return $this->belongsTo('App\Model\Admin\CateGory', 'cid', 'id');
    }
}