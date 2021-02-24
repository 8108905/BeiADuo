<?php

use think\migration\Migrator;
use think\migration\db\Column;

class UserTable extends Migrator
{
    public function change()
    {
        $table = $this->table('user', array('engine' => 'MyISAM'));
        $table
            ->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('group', 'integer')
            ->addColumn('phone', 'string',array('null'=>true))
            ->addColumn('phoneArea', 'string',array('null'=>true))
            ->addColumn('status', 'boolean', array( 'default' => true))
            ->addColumn('gold', 'integer', array('default' => 0))
            ->addColumn('loginCount', 'integer',array('null'=>true))
            ->addColumn('lastLoginIp', 'string',array('null'=>true))
            ->addColumn('lastLoginIpArea', 'string',array('null'=>true))
            ->addColumn('vipEndAt','timestamp')
            ->addColumn('lastLoginAt','timestamp',array('null'=>true))
            ->addColumn('autoPay', 'boolean', array('default' => 0))
            ->addColumn('registerType', 'boolean') //注册类型 用户注册还是后台添加
            ->addColumn('fromType', 'integer') //是漫画 还是动漫 还是其他
            ->addColumn('fromDevice', 'string', array('default' => '未知')) //注册设备
            ->addColumn('fromBrowser', 'string', array('default' => '未知')) //注册浏览器
            ->addColumn('fromIp', 'string',array('null'=>true)) //注册ip
            ->addColumn('fromArea', 'string' ,array('null'=>true)) //注册地址
            ->addColumn('fromReferrer', 'integer',array('null'=>true)) //推荐人
            ->addColumn('invitationCode', 'integer') //邀请码
            ->addTimestamps()
            ->addIndex(array('email'), array('unique' => true))
            ->create();

    }
}
