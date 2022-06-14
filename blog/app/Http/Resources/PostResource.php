<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'content'=>$this->content,
            'created_at'=> Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'category'=>$this->category->name,
        ];
    }
}
