<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SeedComicData extends Migrator
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


for ($i=0;$i<100;$i++)
{
    $data =array(
        'name'=>'中国惊奇先生',
        'subtitle'=>'王小二历险记',
        'thumb'=>'https://www.hwmh.net//storage/1605985137864862.jpg ',
        'cover'=>'https://www.hwmh.net//storage/160598507984381.jpg ',
        'status'=>rand(0,1),
        'tags'=>'恋爱,爱情,剧情,动作,热血,少儿,卡哇伊',

        'author'=>'王小二,西红柿',
        'category_id'=>1,
        'recommend'=>rand(0,1),
        'adult'=>rand(0,1),
        'followersCount'=>rand(1111,99999),
        'readCount'=>rand(1111,99999),
        'likeCount'=>rand(1111,99999),
        'score'=>rand(5.5,9.9),
        'chapter_id'=>rand(1,99),
        'chapter_count'=>rand(1,99),
        'description'=>'平凡的重案组刑警姜正宇在搜查过程中 偶然发现了财阀及政界人士的巨大现金仓库 一场挑战韩国最高权力的腥风血雨就此掀开序幕',
        'vipType'=>rand(0,2),
        'startPay'=>rand(0,10),
        'gold'=>rand(0,100),
        'user_id'=>rand(0,100),
        'review'=>rand(0,2),
        'rejectReason'=>'拒绝理由',
        'locked'=>rand(0,1),
        'from'=>rand(0,2),
        'did'=>222,
    );
    \app\model\Comic::create($data);
}

    }
}
