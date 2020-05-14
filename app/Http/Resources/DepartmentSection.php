<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Department as DepartmentResource;

class DepartmentSection extends JsonResource
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
//            'section_name' => $this->section_name,
//            'department_id' => $this->department_id,
//            'associated_dept' => $this->associated_dept,
//            'section_goal' => $this->section_goal,
//            'section_strength' => $this->section_strength,
//            'sectional_head' => $this->sectional_head,
//            'reason_for_creation' => $this->reason_for_creation,
//        ];

    }
}
