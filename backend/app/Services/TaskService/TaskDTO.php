<?php

namespace App\Services\TaskService;

use App\Traits\HydratesProps;

class TaskDTO
{
    use HydratesProps;

    public ?string $description = null;
    public ?string $name = null;
    public ?string $status = null;
    public ?string $dateExpiration = null;

    public static function fromRequest($request): TaskDTO
    {
        return (new self())->hydrate($request->all());
    }

    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'name' => $this->name,
            'status' => $this->status,
            'date_expiration' => date('Y-m-d H:i:s', strtotime($this->dateExpiration)),
        ];
    }
}
