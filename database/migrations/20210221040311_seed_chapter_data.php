<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SeedChapterData extends Migrator
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
        for ($i=0;$i<1000;$i++)
        {
            $data =array(
                'comic_id'=>rand(1,10),
                'name'=>'中国惊奇先生',
                'subtitle'=>'王小二历险记',
                'thumb'=>'https://www.hwmh.net//storage/1605985137864862.jpg ',
                'status'=>rand(0,1),
                'locked'=>rand(0,1),
                'did'=>rand(0,100),
                'review'=>rand(0,2),
                'rejectReason'=>'没有理由',
                'sort'=>$i,
            );
                \app\model\Chapter::create($data);
        }
    }
}
