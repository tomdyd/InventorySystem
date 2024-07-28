<?php

namespace App\Form;

use App\Entity\DeviceType;
use App\Entity\Localization;
use App\Entity\Printer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrinterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('serial_number')
            ->add('model')
            ->add('brand')
            ->add('mac_address_lan')
            ->add('ip_address')
            ->add('device_type', EntityType::class, [
                'class' => DeviceType::class,
                'choice_label' => function (DeviceType $deviceType) {
                return $deviceType->getType();
                }
            ])
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
            'data_class' => Printer::class,
        ]);
    }
}
