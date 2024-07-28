<?php

namespace App\Form;

use App\Entity\Computer;
use App\Entity\DeviceType;
use App\Entity\Person;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComputerFormType extends AbstractType
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('serial_number', TextType::class)
            ->add('status', TextType::class)
            ->add('model', TextType::class)
            ->add('brand', TextType::class)
            ->add('domain_name', TextType::class)
            ->add('mac_address_lan', TextType::class)
            ->add('mac_address_wifi', TextType::class)
            ->add('ip', TextType::class)
            ->add('localization', TextType::class)
            ->add('date_from', null, [
                'widget' => 'single_text',
            ])
            ->add('device_type', EntityType::class, [
                'class' => DeviceType::class,
                'choice_label' => 'type',
            ])
            ->add('user', TextType::class, [
                'label' => 'Person',
                'attr' => [
                    'list' => 'users-options'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn']
            ]);

        $builder->get('user')
            ->addModelTransformer(new CallbackTransformer(
            // Transformacja obiektu User na string
                function ($user) {
                    return $user ? $user->getFullName() : '';
                },
                // Transformacja stringa z powrotem na obiekt User
                function ($userFullName) {
                    $nameParts = explode(' ', $userFullName, 2);
                    $name = $nameParts[0];
                    $surname = isset($nameParts[1]) ? $nameParts[1] : '';

                    return $this->entityManager->getRepository(User::class)->findOneBy([
                        'Name' => $name,
                        'surname' => $surname
                    ]);
                }
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Computer::class,
        ]);
    }
}
