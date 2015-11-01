<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EventDoc extends Model {

    protected $table = 'events_docs';

    protected $fillable = [
        'events_id',
        'doc_type',
        'docs_url',
    ];

    /**
     * 資料を投稿する
     * @param array $params
     */
    public static function postDocs($params)
    {
        \DB::transaction(function () use ($params) {
            \DB::table('events_docs')
                ->insert([
                    'events_id' => $params['eventsId'],
                    'doc_type' => $params['docType'],
                    'docs_url' => $params['docsUrl'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
        });

    }

    /**
     * 勉強会に紐づく資料の取得
     * @param $id
     * @return mixed
     */
    public static function getDocsByEventId($id)
    {
        return  \DB::table('events')
            ->leftjoin('events_docs', 'events.id', '=', 'events_docs.events_id')
            ->where('events_docs.events_id', '=', $id)
            ->orderBy('events_docs.created_at', 'desc')
            ->select([
                'events_docs.docs_url'
            ])
            ->get();

    }

}
