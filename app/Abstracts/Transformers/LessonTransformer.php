<?php

namespace App\Abstracts\Transformers;

class LessonTransformer extends Transformer {

    public function transform($data)
    {       
        return [
           'id' => $data['id'],
           'title' => $data['title'],
           'description' => $data['description'],
           'body' => $data['body'],
           'video_id' => $data['video_id'],
           'lesson_type_id' => $data['lesson_type_id'],
           'lesson_type' => $data->lessonType['type'],
           'created_at'=> $data->getCreatedDateLocalized(),
        ];
    }
}
