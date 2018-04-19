<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
          'id' => $this->id,
          'title' => $this->title,
          'content' => $this->content,
          'user' =>$this->user,
          'teamOne' => $this->teamOne,
          'teamTwo' => $this->teamTwo,
          'popularity' => $this->popularity,
          'arguments' => $this->arguments



        ];
    }
}
