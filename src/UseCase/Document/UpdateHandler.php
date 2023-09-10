<?php

namespace App\UseCase\Document;

use App\Entity\Document;
use App\Service\Document\UpdateService;
use App\Service\Document\FinderService;
use App\Factory\Dto\DocumentDtoFactory;

class UpdateHandler
{
    /**
     * @param DocumentDtoFactory $documentDtoFactory
     * @param FinderService $documentFinderService
     * @param UpdateService $documentUpdateService
     */
    public function __construct(
        private readonly DocumentDtoFactory $documentDtoFactory,
        private readonly FinderService $documentFinderService,
        private readonly UpdateService $documentUpdateService
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
         */
        return $this->documentUpdateService->update(
            $this->documentFinderService->getById($id),
            $this->documentDtoFactory->createUpdateDocument($data)
        );
    }
}
