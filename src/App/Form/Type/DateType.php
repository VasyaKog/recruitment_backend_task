<?php

declare(strict_types=1);

namespace App\Form\Type;

use Domain\Date\Dto\InputDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateType extends AbstractType
{
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ): void {
        $builder
            ->add(
                'date',
                TextType::class,
            )
            ->add(
                'timezone',
                TextType::class,
            )
            ->add(
                'save',
                SubmitType::class,
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InputDto::class,
        ]);
    }
}