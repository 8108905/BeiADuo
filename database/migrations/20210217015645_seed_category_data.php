<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SeedCategoryData extends Migrator
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
            array('name' => '国漫', 'status' => true,'sort'=>1,'belongsType'=>rand(0,2),'keywords'=>'电视剧,最新电视剧,好看的电视剧,热播电视剧,电视剧在线观看','description'=>'为您提供2018新电视剧排行榜，韩国电视剧、泰国电视剧、香港TVB全新电视剧排行榜、好看的电视剧等热播电视剧排行榜，并提供免费高清电视剧下载及在线观看'),
            array('name' => '日漫', 'status' => true,'sort'=>2,'belongsType'=>rand(0,2),'keywords'=>'电视剧,最新电视剧,好看的电视剧,热播电视剧,电视剧在线观看','description'=>'为您提供2018新电视剧排行榜，韩国电视剧、泰国电视剧、香港TVB全新电视剧排行榜、好看的电视剧等热播电视剧排行榜，并提供免费高清电视剧下载及在线观看'),
            array('name' => '韩漫', 'status' => true,'sort'=>3,'belongsType'=>rand(0,2),'keywords'=>'电视剧,最新电视剧,好看的电视剧,热播电视剧,电视剧在线观看','description'=>'为您提供2018新电视剧排行榜，韩国电视剧、泰国电视剧、香港TVB全新电视剧排行榜、好看的电视剧等热播电视剧排行榜，并提供免费高清电视剧下载及在线观看'),
            array('name' => '其他', 'status' => true,'sort'=>4,'belongsType'=>rand(0,2),'keywords'=>'电视剧,最新电视剧,好看的电视剧,热播电视剧,电视剧在线观看','description'=>'为您提供2018新电视剧排行榜，韩国电视剧、泰国电视剧、香港TVB全新电视剧排行榜、好看的电视剧等热播电视剧排行榜，并提供免费高清电视剧下载及在线观看'),
        );

        foreach ($data as $item)
        {
            \app\model\Category::create($item);
        }
    }
}
