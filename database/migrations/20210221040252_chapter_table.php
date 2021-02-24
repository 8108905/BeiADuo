<?php

use think\migration\Migrator;
use think\migration\db\Column;

class ChapterTable extends Migrator
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
        $table = $this->table('chapter', array('engine' => 'MyISAM'));
        $table
            ->addColumn('comic_id', 'integer')
            ->addColumn('name', 'string')
            ->addColumn('subtitle', 'string', array('null' => true))
            ->addColumn('thumb', 'string', ['null' => true])
            ->addColumn('status', 'boolean', array('default' => true))
            ->addColumn('locked', 'boolean', array('default' => false))
            ->addColumn('did', 'integer', ['null' => true])
            ->addColumn('sort', 'integer',array('default'=>0))
            ->addColumn('review', 'integer', array('null' => true))
            ->addColumn('rejectReason', 'string', array('null' => true))

            ->addTimestamps()->create();



    }
}
