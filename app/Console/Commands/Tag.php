<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Tag as TagModel;

class Tag
{
    private $tag;

    public function __construct(TagModel $tag)
    {
        $this->tag = $tag;
    }

    /**
     * 日曜日になると次週の週報タグを生成する
     */
    public function buildNextWeekTag()
    {
        \Log::info('Start generate tag of Next week. ');
        $dt = new Carbon();
//        $dt->setTestNow($dt->createFromDate(2015, 5, 31));
        if($dt->now()->dayOfWeek === Carbon::SUNDAY) {
            //翌月
            $nextMonth =  $dt->parse('next month')->month;
            // 現在が何週目か
            echo '今日は'.$dt->now()->month.'月の第'.$dt->now()->weekOfMonth.'週目です'.'<br>';
            //今週の金曜を取得
            $thisFriday = $dt->parse('this friday');
            echo '来週の金曜は' . $thisFriday.'<br>';
            // 月またぎの場合
            if($thisFriday->month === $nextMonth) {
                echo $thisFriday->year . '年の'. $thisFriday->month . '月の第'.$thisFriday->weekOfMonth.'週目です'.'<br>';
                $nextWeekTag = '週報@'. $thisFriday->year. '年'. $thisFriday->month. '月第'. $thisFriday->weekOfMonth. '週目';
                $this->tag->tag = $nextWeekTag;
                $this->tag->save();
            } else {
                echo '翌週は'.$thisFriday->month.'月の第'.$thisFriday->weekOfMonth.'週目です'.'<br>';
                $nextWeekTag = '週報@'. $thisFriday->year. '年'. $thisFriday->month. '月第'. $thisFriday->weekOfMonth. '週目';
                $this->tag->tag = $nextWeekTag;
                $this->tag->save();
            }
            \Log::info('End generate tag');
        } else {
            \Log::info('Today is not Sunday.');
        }
    }
}