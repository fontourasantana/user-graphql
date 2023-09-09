<?php

namespace App\UseCase\Document;

use App\Entity\Document;
use App\Dto\DocumentDto;
use App\Service\User\FinderService;
use App\Service\Document\CreateService;

class CreateHandler
{
    /**
     * @param CreateService $createService
     * @param FinderService $userFinderService
     */
    public function __construct(
        private readonly CreateService $createService,
        private readonly FinderService $userFinderService
    ) {
    }

    /**
     * @param array $data
     * @return Document
     */
    public function handle(array $data): Document
    {
        /**
         * @todo: adicionar validação do input
         * @todo: adicionar mapper para passar dados do array para o dto
         */
        return $this->createService->create(
            (new DocumentDto())
                ->setType($data['type'])
                ->setNumber($data['number'])
                ->setActive($data['active'])
                ->setUser($this->userFinderService->getById($data['user']))
        );
    }
}
