<?php

declare(strict_types=1);

namespace App\Hydrator;

use App\Entity\Customer;
use App\Generic\GenericHydrator;

class CustomerHydrator
{
    public static function hydrate(array $data, Customer $object): Customer
    {
        foreach ($data as $key => $value) {
            $setterName = self::generateSetterName($key);
            if (method_exists($object, $setterName)) {
                $object->$setterName($value);
            }
        }

        return $object;
    }

    public static function extract(Customer $object): array
    {
        // TODO: Implement extract() method.
    }

    public static function generateSetterName(string $fieldName): string
    {
        return 'set' . array_reduce(explode('_', $fieldName), fn (?string $return, string $part): ?string => $return.ucfirst($part));
    }

    public static function generateGetterName(string $fieldName): string
    {
        return 'get' . array_reduce(explode('_', $fieldName), fn (?string $return, string $part): ?string => $return.ucfirst($part));
    }
}
