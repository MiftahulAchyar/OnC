<?php

namespace App\Abstracts\Transformers;
class SectionTransformer extends Transformer {

    public function transform($data)
    {       
        return [
           'id' => $data['id'],
           'slug' => $data['slug'],
           'name' => $data['name'],
           'lessons' => $data["lessons"],
           'created_at'=> $data->getCreatedDateLocalized(),
        ];
    }
}
