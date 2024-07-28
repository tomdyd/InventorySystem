<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addModelTransformer(new CallbackTransformer(
            function ($user) {
                // Transformacja obiektu User na string
                return $user ? $user->getFullName() : '';
            },
            function ($userFullName) {
                dump($userFullName);
                // Transformacja stringa z powrotem na obiekt User
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
            'class' => User::class,
        ]);
    }

    public function getParent(): string
    {
        return EntityType::class;
    }
}
