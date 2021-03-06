<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class AdminSentence extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'sentence';

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


    public function users()
    {
        return $this->belongsTo('App\Model\Home\HomeUser','hid','id');
    }
}
