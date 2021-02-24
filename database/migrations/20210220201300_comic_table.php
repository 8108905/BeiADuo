<?php

use think\migration\Migrator;
use think\migration\db\Column;

class ComicTable extends Migrator
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
        $table = $this->table('comic', array('engine' => 'MyISAM'));
        $table
            ->addColumn('name', 'string')
            ->addColumn('subtitle', 'string', array('null' => true))
            ->addColumn('thumb', 'string')
            ->addColumn('cover', 'string', array('null' => true))
            ->addColumn('status', 'boolean', array('default' => false))
            ->addColumn('tags', 'string', array('null' => true))

            ->addColumn('author', 'string', array('default' => '匿名'))
            ->addColumn('category_id', 'integer')
            ->addColumn('recommend', 'boolean', array('default' => false))
            ->addColumn('adult', 'boolean', array('default' => false))
            ->addColumn('followersCount', 'integer', array('default' => 0))
            ->addColumn('readCount', 'integer', array('default' => 0))
            ->addColumn('likeCount', 'integer', array('default' => 0))
            ->addColumn('score', 'integer', array('default' => 8.9))
            ->addColumn('chapter_id', 'integer', array('null' => true))
            ->addColumn('chapter_count', 'integer', array('null' => true))
            ->addColumn('description', 'string', array('null' => true))
            ->addColumn('vipType', 'integer', array('default' => 0))
            ->addColumn('startPay', 'integer', array('default' => 0))
            ->addColumn('gold', 'integer')
            ->addColumn('user_id', 'integer', array('null' => true))
            ->addColumn('review', 'integer', array('null' => true))
            ->addColumn('rejectReason', 'string', array('null' => true))
            ->addColumn('locked', 'boolean', array('default' => false))
            ->addColumn('from', 'integer', array('default' => '0'))
            ->addColumn('did', 'string', array('null' => true))
            ->addTimestamps()->create();
    }
}
