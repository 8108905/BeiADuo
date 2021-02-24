<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SeedThemeData extends Migrator
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
            array('name' => '恋爱', 'status' => true,'sort'=>1,'belongsType'=>rand(0,2)),
            array('name' => '悬疑', 'status' => true,'sort'=>2,'belongsType'=>rand(0,2)),
            array('name' => '惊悚', 'status' => true,'sort'=>3,'belongsType'=>rand(0,2)),
            array('name' => '剧情', 'status' => true,'sort'=>4,'belongsType'=>rand(0,2)),
        );

        foreach ($data as $item)
        {
            \app\model\Theme::create($item);
        }
    }

}
