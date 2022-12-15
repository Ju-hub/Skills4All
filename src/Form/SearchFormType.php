<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\CarCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class SearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        //Création du formulaire permettant de filtrer des voitures selon plusieurs critères
        $builder
            ->add('search', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher une voiture'
                ]
                ])
            ->add('categories', EntityType::class,[
                'label' => false,
                'required' => false,
                'expanded' => true,
                'multiple' => true,
                'class' => CarCategory::class,
                'choice_label' => "getName"
            ])
            ->add('min', NumberType::class, [
                'label'=> false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix min'
                ]
            ])
            ->add('max', NumberType::class, [
                'label'=> false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix max'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' =>'GET',
            'csrf_protection' =>false
        ]);
    }
}
