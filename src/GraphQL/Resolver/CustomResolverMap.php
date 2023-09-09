<?php

namespace App\GraphQL\Resolver;

use ArrayObject;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Resolver\ResolverMap;
use App\UseCase\User\GetAllHandler as GetAllUsersHandler;
use Overblog\GraphQLBundle\Definition\ArgumentInterface;
use App\UseCase\User\GetByIdHandler as GetUserByIdHandler;
use App\UseCase\Address\UpdateHandler as UpdateAddressHandler;
use App\UseCase\Address\CreateHandler as CreateAddressHandler;
use App\UseCase\Document\UpdateHandler as UpdateDocumentHandler;
use App\UseCase\Document\CreateHandler as CreateDocumentHandler;
use App\UseCase\Address\GetAllHandler as GetAllAddressesHandler;
use App\UseCase\Address\GetByIdHandler as GetAddressByIdHandler;
use App\UseCase\Document\GetAllHandler as GetAllDocumentsHandler;
use App\UseCase\Document\GetByIdHandler as GetDocumentByIdHandler;

class CustomResolverMap extends ResolverMap
{
    /**
     * @param GetUserByIdHandler $getUserByIdHandler
     * @param GetAllUsersHandler $getAllUsersHandler
     * @param GetAddressByIdHandler $getAddressByIdHandler
     * @param GetAllAddressesHandler $getAllAddressesHandler
     * @param GetDocumentByIdHandler $getDocumentByIdHandler
     * @param GetAllDocumentsHandler $getAllDocumentsHandler
     * @param CreateDocumentHandler $createDocumentHandler
     * @param UpdateDocumentHandler $updateDocumentHandler
     * @param CreateAddressHandler $createAddressHandler
     * @param UpdateAddressHandler $updateAddressHandler
     */
    public function __construct(
        private readonly GetUserByIdHandler $getUserByIdHandler,
        private readonly GetAllUsersHandler $getAllUsersHandler,
        private readonly GetAddressByIdHandler $getAddressByIdHandler,
        private readonly GetAllAddressesHandler $getAllAddressesHandler,
        private readonly GetDocumentByIdHandler $getDocumentByIdHandler,
        private readonly GetAllDocumentsHandler $getAllDocumentsHandler,
        private readonly CreateDocumentHandler $createDocumentHandler,
        private readonly UpdateDocumentHandler $updateDocumentHandler,
        private readonly CreateAddressHandler $createAddressHandler,
        private readonly UpdateAddressHandler $updateAddressHandler
    ) {
    }

    /**
     * @inheritDoc
     */
    protected function map(): array
    {
        return [
            'RootQuery' => [
                self::RESOLVE_FIELD => function (
                    $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ) {
                    return match ($info->fieldName) {
                        'user' => $this->getUserByIdHandler->handle((int) $args['id']),
                        'users' => $this->getAllUsersHandler->handle(),
                        'address' => $this->getAddressByIdHandler->handle((int) $args['id']),
                        'addresses' => $this->getAllAddressesHandler->handle(),
                        'document' => $this->getDocumentByIdHandler->handle((int) $args['id']),
                        'documents' => $this->getAllDocumentsHandler->handle(),
                        default => null
                    };
                },
            ],
            'RootMutation' => [
                self::RESOLVE_FIELD => function (
                    $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ) {
                    return match ($info->fieldName) {
                        'createDocument' => $this->createDocumentHandler->handle($args['document']),
                        'updateDocument' => $this->updateDocumentHandler->handle((int) $args['id'], $args['document']),
                        'createAddress' => $this->createAddressHandler->handle($args['address']),
                        'updateAddress' => $this->updateAddressHandler->handle((int) $args['id'], $args['address']),
                        default => null
                    };
                },
            ]
        ];
    }
}
