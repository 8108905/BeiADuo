<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CardTable extends Migrator
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
        $table = $this->table('card', array('engine' => 'MyISAM'));
        $table
            ->addColumn('name', 'string')
            ->addColumn('password', 'string')
            ->addColumn('money', 'integer')
            ->addColumn('gold', 'integer')
            ->addColumn('status', 'boolean',array('default'=>true))
            ->addColumn('use_time','timestamp',array('null'=>true))
            ->addColumn('type', 'boolean')
            ->addColumn('user_id', 'integer',array('null'=>true))

            ->addTimestamps()
            ->create();

    }
}
