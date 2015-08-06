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
     * 金曜日になると今週の週報タグを生成する
     */
    public function buildNextWeekTag()
    {
        \Log::info('Start generate tag of This week. ');
        $dt = new Carbon();
//        $dt->setTestNow($dt->createFromDate(2015, 5, 31));
        if($dt->now()->dayOfWeek === Carbon::FRIDAY) {
            //翌月
            $nextMonth =  $dt->parse('next month')->month;
            // 現在が何週目か
            \Log::info('今日は'.$dt->now()->month.'月の第'.$dt->now()->weekOfMonth.'週目です');
            //今週の金曜を取得
            $thisFriday = $dt->parse('this friday');
            \Log::info('来週の金曜は' . $thisFriday);
            // 月またぎの場合
            if($thisFriday->month === $nextMonth) {
                \Log::info($thisFriday->year . '年の'. $thisFriday->month . '月の第'.$thisFriday->weekOfMonth.'週目です');
                $nextWeekTag = '週報@'. $thisFriday->year. '年'. $thisFriday->month. '月第'. $thisFriday->weekOfMonth. '週';
                $this->tag->tag = $nextWeekTag;
                $this->tag->save();
            } else {
                \Log::info('翌週は'.$thisFriday->month.'月の第'.$thisFriday->weekOfMonth.'週目です');
                $nextWeekTag = '週報@'. $thisFriday->year. '年'. $thisFriday->month. '月第'. $thisFriday->weekOfMonth. '週';
                $this->tag->tag = $nextWeekTag;
                $this->tag->save();
            }
            \Log::info('End generate tag');
        } else {
            \Log::info('Today is not Friday.');
        }
    }
}