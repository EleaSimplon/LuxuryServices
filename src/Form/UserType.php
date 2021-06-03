<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Experience;
use App\Entity\JobCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\File;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('password', PasswordType::class, [
                'required' => false,
                'mapped' => false
            ])
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Male' => 'Male',
                    'Female' => 'Female',
                    'Transgenre' => 'Transgenre',
                ],
            ])
            ->add('firstName')
            ->add('lastName')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('passport', FileType::class, [
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                'required' => false,
                'label' => ' ',
            ])
            ->add('cv', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => ' ',
            ])
            ->add('photo', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => ' ',
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [

                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
            ->add('searchLocation')
            ->add('birthDate', TextType::class, [
                'required' => false,
            ])
            ->add('birthLocation')
            ->add('isAvailable')
            ->add('description', TextareaType::class, [
                'required' => false,
            ])
            ->add('experience', EntityType::class, [
                'class'  => Experience::class])

            ->add('category', EntityType::class, [
                'class'  => JobCategory::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}