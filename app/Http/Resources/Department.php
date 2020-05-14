<?php

namespace App\Http\Resources;
use App\Http\Resources\DepartmentSection as SectionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Department extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
     return parent::toArray($request);

//        return [
//            'id' => $this->id,
//            'department_name' => $this->department_name,
//            'department_HOD' => $this->department_HOD,
//            'department_strength' => $this->department_strength,
//            'department_rules' => $this->department_rules,
//            'sections' => SectionResource::collection($this->whenLoaded('sections')),
//            'created_at' => (string) $this->created_at,
//            'updated_at' => (string) $this->updated_at
//        ];
    }
}
