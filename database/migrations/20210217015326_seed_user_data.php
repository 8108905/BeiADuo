<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SeedUserData extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        \app\model\User::create([
            'name'=>'小明',
            'email'=>'admini',
            'password'=>md5('admini'),
            'group'=>4,
            'phone'=>'13'.rand(111111111,999999999),
            'phoneArea'=>'中国 广东省 深圳市 龙岗区',
            'status'=>true,
            'gold'=>rand(10,100),
            'loginCount'=>rand(10,99),
            'lastLoginIp'=>$this->ip(),
            'lastLoginIpArea'=>'中国 河北省 邢台市 铁西区',
            'vipEndAt'=>date('Y-m-d H:i:s'),
            'lastLoginAt'=>date('Y-m-d H:i:s'),
            'autoPay'=>rand(0,1),
            'registerType'=>rand(0,1),
            'fromType'=>rand(1,3),
            'fromDevice'=>array_rand(array('电脑'=>'电脑','苹果手机'=>'苹果手机','安卓手机'=>'安卓手机','IPAD'=>'IPAD'),1),
            'fromBrowser'=>array_rand(array('360'=>'360','chrome'=>'chrome','sefari'=>'sefari','UC浏览器'=>'UC浏览器'),1),
            'fromIp'=>$this->ip(),
            'fromArea'=>'中国 河南省 信阳 罗山',
            'fromReferrer'=>rand(1,50),
            'invitationCode'=>rand(10000,99999),
        ]);
        for ($i=1;$i< 100;$i++)
        {
            \app\model\User::create([
                'name'=>'小明'.$i,
                'email'=>'admin'.$i.'@gmail.com',
                'password'=>md5('admini'),
                'group'=> rand(1,3),
                'phone'=>'13'.rand(111111111,999999999),
                'phoneArea'=>'中国 广东省 深圳市 龙岗区',
                'status'=>rand(0,1),
                'gold'=>rand(10,100),
                'loginCount'=>rand(10,99),
                'lastLoginIp'=>$this->ip(),
                'lastLoginIpArea'=>'中国 河北省 邢台市 铁西区',
                'vipEndAt'=>date('Y-m-d H:i:s'),
                'lastLoginAt'=>date('Y-m-d H:i:s'),
                'autoPay'=>rand(0,1),
                'registerType'=>rand(0,1),
                'fromType'=>rand(1,3),
                'fromDevice'=>array_rand(array('电脑'=>'电脑','苹果手机'=>'苹果手机','安卓手机'=>'安卓手机','IPAD'=>'IPAD'),1),
                'fromBrowser'=>array_rand(array('360'=>'360','chrome'=>'chrome','sefari'=>'sefari','UC浏览器'=>'UC浏览器'),1),
                'fromIp'=>$this->ip(),
                'fromArea'=>'中国 河南省 信阳 罗山',
                'fromReferrer'=>rand(1,50),
                'invitationCode'=>rand(10000,99999),
            ]);
        }

    }
    function ip()
    {
        $ip_long = array(
            array('607649792', '608174079'), // 36.56.0.0-36.63.255.255
            array('1038614528', '1039007743'), // 61.232.0.0-61.237.255.255
            array('1783627776', '1784676351'), // 106.80.0.0-106.95.255.255
            array('2035023872', '2035154943'), // 121.76.0.0-121.77.255.255
            array('2078801920', '2079064063'), // 123.232.0.0-123.235.255.255
            array('-1950089216', '-1948778497'), // 139.196.0.0-139.215.255.255
            array('-1425539072', '-1425014785'), // 171.8.0.0-171.15.255.255
            array('-1236271104', '-1235419137'), // 182.80.0.0-182.92.255.255
            array('-770113536', '-768606209'), // 210.25.0.0-210.47.255.255
            array('-569376768', '-564133889'), // 222.16.0.0-222.95.255.255
        );
        $rand_key = mt_rand(0, 9);
        return $ip = long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
    }
}
