<?php

namespace App\UseCase\Document;

use App\Entity\Document;
use App\Service\User\FinderService;
use App\Service\Document\CreateService;
use App\Factory\Dto\DocumentDtoFactory;

class CreateHandler
{
    /**
     * @param DocumentDtoFactory $documentDtoFactory
     * @param CreateService $documentCreateService
     * @param FinderService $userFinderService
     */
    public function __construct(
        private readonly DocumentDtoFactory $documentDtoFactory,
        private readonly CreateService $documentCreateService,
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
         */
        $documentDto = $this->documentDtoFactory->create($data);
        $documentDto->setUser($this->userFinderService->getById($data['user']));
        $document = $this->documentCreateService->create($documentDto);

        return $this->documentCreateService->save($document);
    }
}
