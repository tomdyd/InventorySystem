<?php

namespace App\Form;

use App\Entity\User;
use App\Service\RoleService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateRolesTypeFormType extends AbstractType
{
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $roles = $this->roleService->getRoles();

        $builder
            ->add('name', TextType::class, [
                'label' => 'User',
                'attr' => [
                    'list' => 'users-options',
                    'autocomplete' => 'off'
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => $roles,
                'multiple' => true,
                'expanded' => false,
                'label' => 'Roles',
            ]);

        $builder->add('Register', SubmitType::class, [
            'attr' => ['class' => 'btn']
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
