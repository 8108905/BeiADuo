<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CategoryTable extends Migrator
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
        $table = $this->table('category', array('engine' => 'MyISAM'));
        $table
            ->addColumn('name', 'string')
            ->addColumn('status', 'boolean', array('default' => true))
            ->addColumn('sort', 'integer',array('default'=>0))
            ->addColumn('belongsType', 'integer')
            ->addColumn('keywords', 'string',array('null'=>true))
            ->addColumn('description', 'string',array('null'=>true))
            ->addTimestamps()
            ->create();
    }
}
