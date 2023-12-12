<?php

namespace Modules\Login\Services;

use Modules\Login\Repository\RegisterRepository;

class RegisterService
{
    private $registerRepository;

    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function checkExists($data)
    {
        return $this->registerRepository->checkExists($data);
    }

    public function create($data): bool
    {
        $checkUser = $this->registerRepository->checkExists($data);
        if (empty($checkUser)) {
            $this->registerRepository->create($data);

            return true;
        }

        return false;
    }
}
