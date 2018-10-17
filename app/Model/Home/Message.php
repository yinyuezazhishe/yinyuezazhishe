<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //数据表名称
    protected $table = 'message';

    //可写字段
    protected $fillable = [
        'hid','content',
    ];

     //动态流-最新留言
    static public function new()
    {
        $message = Message::orderBy('hid','desc')->take(5)->get();

        return $message;
    }

    //模型关联：获取该留言所属的用户模型
    public function HomeUser()
    {
        return $this->belongsTo('App\Model\HomeUser');
    }

   //模型关联：获取该留言的所有回复
    public function remessages()
    {
        return $this->hasMany('App\Models\Remessage');
    }
}
