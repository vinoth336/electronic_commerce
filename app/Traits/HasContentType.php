<?php

namespace App\Traits;

use App\Content\ContentType;

trait HasContentType
{
    public function castContentToJsonString(ContentType $content): string
    {
        $data = array_merge(['#type' => get_class($content)], $content->getAttributes());

        return json_encode($data);
    }

    public function normalizeContent(string $content): ContentType
    {
        $content = json_decode($content, true);
        $class = $content['#type'];
        $contentObject = new $class;
        unset($content['#type']);
        $contentObject->setAttributes($content);

        return $contentObject;
    }
}
