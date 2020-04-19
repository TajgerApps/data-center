<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, ['required' => true])
            ->add('lastname', null, ['required' => true])
            ->add('email', null, ['required' => true])
            ->add('is_company', null, ['required' => false])
            ->add('company_name', null, ['required' => false])
            ->add('short_company_name', null, ['required' => false])
            ->add('nip', null, ['required' => false])
            ->add('regon', null, ['required' => false])
            ->add('street', null, ['required' => false])
            ->add('city', null, ['required' => false])
            ->add('building', null, ['required' => false])
            ->add('floor', null, ['required' => false])
            ->add('zip_code', null, ['required' => false])
            ->add('country', null, ['required' => false])
            ->add('is_contact_adrees', null, ['required' => false])
            ->add('contact_street', null, ['required' => false])
            ->add('contact_building', null, ['required' => false])
            ->add('contact_flat_number', null, ['required' => false])
            ->add('contact_country', null, ['required' => false])
            ->add('contact_city', null, ['required' => false])
            ->add('contact_zip_code', null, ['required' => false])
            ->add('phone', null, ['required' => false])
            ->add('second_phone', null, ['required' => false])
            ->add('save', SubmitType::class, ['label' => 'Save']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
