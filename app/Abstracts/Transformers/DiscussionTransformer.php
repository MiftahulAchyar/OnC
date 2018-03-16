<?php

namespace App\Abstracts\Transformers;

class DiscussionTransformer extends Transformer {

    public function transform($data)
    {       
        return [
           'id' => $data['id'],
           'user_id' => $data['user_id'],
           'user_name' => $data->user['name'],
           'text' => $data['text'],
           'number_of_votes' => $data['number_of_votes'],
           'created_at'=> $data->getCreatedDateTimeLocalized(),
           'replies' =>  $this->transformCollection($data['discussions'])
        ];
    }
}
