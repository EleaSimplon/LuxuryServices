<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\JobCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\JobCategoryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('societyName')
            ->add('nameContact')
            ->add('mailContact', EmailType::class, [])
            ->add('phoneNumberContact', TelType::class, [])
            // ->add('createdAt')
            ->add('activityType', EntityType::class, [
                'class'  => JobCategory::class])
            // ->add('infoAdminClient', null)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
