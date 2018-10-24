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

	 static public function AdverTising($advertising=[])
    {
        $advertising = self::orderBy('id', 'asc')->limit(5)->get();

        return $advertising;
    }
}
