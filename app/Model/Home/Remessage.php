<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Remessage extends Model
{
    //数据表名称
    protected $table = 'remessages';

    //可写字段
    protected $fillable = [
        'user_id','message_id','content',
    ];

    //模型关联：获取该评论所属的用户模型
    public function homeuser()
    {
        return $this->belongsTo('App\Model\Home\HomeUser');
    }
}
