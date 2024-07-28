<?php

namespace App\Form;

use App\Entity\Localization;
use App\Entity\Terminal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TerminalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('serial_number')
            ->add('Brand')
            ->add('Model')
            ->add('Localization', EntityType::class, [
                'class' => Localization::class,
                'choice_label' => function (Localization $localization) {
                return $localization->getAddress() . " " . $localization->getDescription();
                }
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Terminal::class,
        ]);
    }
}
