<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SeedBannerData extends Migrator
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

        for ($i = 0; $i < 5; $i++) {
            $data = array(
                'name' => '标题+' . $i,
                'image' => 'https://puui.qpic.cn/media_img/lena/PICloq4ur_580_1680/0',
                'href' => 'https://www.beiaduo.com/',
                'comic_id' => $i,
                'type' => rand(0,1),
                'sort' => $i,

            );

            \app\model\Banner::create($data);
        }
    }
}
