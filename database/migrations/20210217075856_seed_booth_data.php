<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SeedBoothData extends Migrator
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
        $data = array(
            array('name' => '贝阿朵官网广告', 'image'=>'https://www.beiaduo.com/assets/img/logo.png', 'href'=>'https://www.beiaduo.com/','status' => true,'sort'=>1),
            array('name' => '贝阿朵采集接口广告', 'image'=>'https://www.beiaduo.com/assets/img/logo.png', 'href'=>'https://www.beiaduo.com/collection','status' => true,'sort'=>2),
            array('name' => '贝阿朵APP广告', 'image'=>'https://www.beiaduo.com/assets/img/logo.png', 'href'=>'https://www.beiaduo.com/','status' => true,'sort'=>3),
            array('name' => '贝阿朵漫画程序广告', 'image'=>'https://www.beiaduo.com/assets/img/logo.png', 'href'=>'https://www.beiaduo.com/','status' => true,'sort'=>4),
        );

        foreach ($data as $item)
        {
            \app\model\Booth::create($item);
        }

    }
}
