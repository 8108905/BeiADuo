<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SeedUserLoginLogData extends Migrator
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

        for ($i = 1; $i < 300; $i++) {
            $data = array(
                'user_id' => rand(1, 10),
                'group' => rand(1, 4),
                'fromDevice' => array_rand(array('电脑' => '电脑', '苹果手机' => '苹果手机', '安卓手机' => '安卓手机', 'IPAD' => 'IPAD'), 1),
                'fromBrowser' => array_rand(array('360' => '360', 'chrome' => 'chrome', 'sefari' => 'sefari', 'UC浏览器' => 'UC浏览器'), 1),
                'loginIp' => $this->ip(),
                'loginIpArea' => '中国 河北省 邢台市 铁西区',
            );
            \app\model\UserLoginLog::create($data);
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
