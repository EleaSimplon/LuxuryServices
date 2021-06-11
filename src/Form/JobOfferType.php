<?php

namespace App\Form;

use App\Entity\JobOffer;
use App\Entity\JobType;
use App\Entity\JobCategory;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\JobCategoryType;
use App\Form\JobTypeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleJob')
            ->add('isVisible')
            // ->add('createdAt')
            ->add('expiredAt', TextType::class, [])
            ->add('salary')
            ->add('location')
            ->add('description')
            ->add('category', EntityType::class, [
                'class'  => JobCategory::class])
            ->add('type', EntityType::class, [
                'class'  => JobType::class])
            ->add('client')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobOffer::class,
        ]);
    }
}
