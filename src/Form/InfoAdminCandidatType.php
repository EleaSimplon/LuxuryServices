<?php

namespace App\Form;

use App\Entity\InfoAdminCandidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfoAdminCandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('notes')
            // ->add('createdAt')
            // ->add('updatedAt')
            // ->add('deletedAt')
            ->add('files', FileType::class, [
                'label' => ''
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfoAdminCandidat::class,
        ]);
    }
}
