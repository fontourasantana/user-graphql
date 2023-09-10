<?php

namespace App\GraphQL\Resolver;

use ArrayObject;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Resolver\ResolverMap;
use App\UseCase\User\CreateHandler as CreateUserHandler;
use App\UseCase\User\GetAllHandler as GetAllUsersHandler;
use Overblog\GraphQLBundle\Definition\ArgumentInterface;
use App\UseCase\User\GetByIdHandler as GetUserByIdHandler;
use App\UseCase\Address\UpdateHandler as UpdateAddressHandler;
use App\UseCase\Document\UpdateHandler as UpdateDocumentHandler;
use App\UseCase\Address\GetAllHandler as GetAllAddressesHandler;
use App\UseCase\Address\GetByIdHandler as GetAddressByIdHandler;
use App\UseCase\Document\GetAllHandler as GetAllDocumentsHandler;
use App\UseCase\Document\GetByIdHandler as GetDocumentByIdHandler;
use App\UseCase\User\Address\CreateHandler as CreateUserAddressHandler;
use App\UseCase\User\Document\CreateHandler as CreateUserDocumentHandler;

class CustomResolverMap extends ResolverMap
{
    /**
     * @param GetUserByIdHandler $getUserByIdHandler
     * @param GetAllUsersHandler $getAllUsersHandler
     * @param CreateUserHandler $createUserHandler
     * @param CreateUserAddressHandler $createUserAddressHandler
     * @param CreateUserDocumentHandler $createUserDocumentHandler
     * @param GetAddressByIdHandler $getAddressByIdHandler
     * @param GetAllAddressesHandler $getAllAddressesHandler
     * @param UpdateAddressHandler $updateAddressHandler
     * @param GetDocumentByIdHandler $getDocumentByIdHandler
     * @param GetAllDocumentsHandler $getAllDocumentsHandler
     * @param UpdateDocumentHandler $updateDocumentHandler
     */
    public function __construct(
        private readonly GetUserByIdHandler $getUserByIdHandler,
        private readonly GetAllUsersHandler $getAllUsersHandler,
        private readonly CreateUserHandler $createUserHandler,
        private readonly CreateUserAddressHandler $createUserAddressHandler,
        private readonly CreateUserDocumentHandler $createUserDocumentHandler,
        private readonly GetAddressByIdHandler $getAddressByIdHandler,
        private readonly GetAllAddressesHandler $getAllAddressesHandler,
        private readonly UpdateAddressHandler $updateAddressHandler,
        private readonly GetDocumentByIdHandler $getDocumentByIdHandler,
        private readonly GetAllDocumentsHandler $getAllDocumentsHandler,
        private readonly UpdateDocumentHandler $updateDocumentHandler
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
                        'createUser' => $this->createUserHandler->handle($args['user']),
                        'createUserDocument' => $this->createUserDocumentHandler->handle((int) $args['user'], $args['document']),
                        'updateDocument' => $this->updateDocumentHandler->handle((int) $args['id'], $args['document']),
                        'createUserAddress' => $this->createUserAddressHandler->handle((int) $args['user'], $args['address']),
                        'updateAddress' => $this->updateAddressHandler->handle((int) $args['id'], $args['address']),
                        default => null
                    };
                },
            ]
        ];
    }
}
