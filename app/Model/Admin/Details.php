<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'details';

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
     * 获得此详情的内容
     */
    public function details_content()
    {
        return $this->hasOne('App\Model\Admin\DetailsContent', 'did', 'id');
    }

    /**
     * 获得此详情对应的列表。
     */
    public function lists()
    {
<<<<<<< HEAD
        return $this->belongsTo('App\Model\Admin\Lists', 'lid', 'id');
=======
        return $this->belongsTo('App\Model\Admin\Lists', 'lid', 'id')->where('status', '<>', '1');
>>>>>>> ljh
    }
}