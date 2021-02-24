<?php

use think\migration\Migrator;
use think\migration\db\Column;

class LinkTable extends Migrator
{
    public function change()
    {
        $table = $this->table('link', array('engine' => 'MyISAM'));
        $table
            ->addColumn('name', 'string')
            ->addColumn('logo', 'string', array('null' => true))
            ->addColumn('href', 'string', ['null' => true])
            ->addColumn('status', 'boolean', array('default' => true))
            ->addColumn('sort', 'integer', array('default' => 0))
            ->addColumn('type', 'boolean')
            ->addTimestamps()->create();
    }
}
