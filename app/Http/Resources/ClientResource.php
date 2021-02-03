<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        // Map Domain Client model values
        $data = $this->map(function ($item) {
            return [
                'id'                    => $item->id()->value(),
                'firstName'             => $item->firstName()->value(),
                'secondName'            => $item->secondName()->value(),
                'surname'               => $item->surname()->value(),
                'secondSurname'         => $item->secondSurname()->value(),
                'email'                 => $item->email()->value(),
                'address'               => $item->address()->value(),
                'phone'                 => $item->phone()->value(),
                'job'                   => $item->job()->value(),
                'department'            => $item->department()->value(),
                'city'                  => $item->city()->value(),
                'identification'        => $item->identification()->value(),
                'identification_type'   => $item->identificationType()->value(),
            ];
        });
        return [
            'data' => $data->all()
        ];
    }
}
