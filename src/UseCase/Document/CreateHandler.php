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
     * @param int $userId
     * @param array $data
     * @return Document
     */
    public function handle(int $userId, array $data): Document
    {
        /**
         * @todo: adicionar validação do input
         */
        $user = $this->userFinderService->getById($userId);
        $documentDto = $this->documentDtoFactory->create($data);
        $document = $this->documentCreateService->create($documentDto);
        $document->setUser($user);

        return $this->documentCreateService->save($document);
    }
}
