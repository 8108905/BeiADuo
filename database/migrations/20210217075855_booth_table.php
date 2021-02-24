<?php

use think\migration\Migrator;
use think\migration\db\Column;

class BoothTable extends Migrator
{
    public function change()
    {
        $table = $this->table('booth', array('engine' => 'MyISAM'));
        $table->addColumn('name', 'string')
            ->addColumn('image', 'string')
            ->addColumn('href', 'string',array('null'=>true))
            ->addColumn('status', 'boolean', array('default' => true))
            ->addColumn('sort', 'integer',array('default'=>0))
            ->addTimestamps()->create();
    }
}
