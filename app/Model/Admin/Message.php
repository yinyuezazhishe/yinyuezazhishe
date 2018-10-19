<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'message';

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

     //动态流-最新留言
    static public function new()
    {
        $message = Message::orderBy('addtime','desc')->take(5)->get();

        return $message;
    }

    //模型关联：获取该留言所属的用户模型
    public function homeuser()
    {
        return $this->belongsTo('App\Model\Home\HomeUser', 'user_id', 'id');
    }

   //模型关联：获取该留言的所有回复
    public function remessages()
    {
        return $this->hasMany('App\Model\Home\Remessage', 'message_id', 'id');
    }
}
