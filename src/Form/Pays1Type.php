<?php

namespace App\Form;

use App\Entity\Continent;
use App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\ContinentRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;


use Symfony\Component\Translation\TranslatableMessage;

class Pays1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('nomPays', TextType::class, [

                'label' => new TranslatableMessage('nomPays'),

                'label_attr' => ['class' => 'fw-bold'],

                'attr' => ['class' => 'form-control']

            ])

            // ->add('continents', EntityType::class, [

            //     'class' => Continent::class,

            //     'choice_label' => 'id',

            // ])

            ->add('continents', null, [

                'label_attr' => ['class' => 'fw-bold'],

                'attr' => ['class' => 'form-control'],

                'query_builder' => function (ContinentRepository $repository) {

                    return $repository->createQueryBuilder('u')->orderBy('u.nom', 'ASC');
                }

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pays::class,
        ]);
    }
}
