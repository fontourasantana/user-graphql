<?php

namespace App\UseCase\Document;

use App\Entity\Document;
use App\Dto\DocumentDto;
use App\Service\Document\UpdateService;
use App\Service\Document\FinderService;

class UpdateHandler
{
    /**
     * @param FinderService $finderService
     * @param UpdateService $updateService
     */
    public function __construct(
        private readonly FinderService $finderService,
        private readonly UpdateService $updateService
    ) {
    }

    /**
     * @param int $id
     * @param array $data
     * @return Document
     */
    public function handle(int $id, array $data): Document
    {
        /**
         * @todo: adicionar validação do input
         * @todo: adicionar mapper para passar dados do array para o dto
         */
        return $this->updateService->update(
            $this->finderService->getById($id),
            (new DocumentDto())->setActive($data['active'])
        );
    }
}
