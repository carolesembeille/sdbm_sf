<?php

namespace App\Form;

use App\Entity\Fabricant;
use App\Entity\Marque;
use App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Repository\FabricantRepository;
use App\Repository\PaysRepository;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarqueType extends AbstractType
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

            ->add('fabricants', null, [

                'label_attr' => ['class' => 'fw-bold'],

                'attr' => ['class' => 'form-control'],

                'query_builder' => function (FabricantRepository $repository) {

                    return $repository->createQueryBuilder('u')->orderBy('u.nom', 'ASC');
                }

            ])

            ->add('pays', null, [

                'label_attr' => ['class' => 'fw-bold'],

                'attr' => ['class' => 'form-control'],

                'query_builder' => function (PaysRepository $repository) {

                    return $repository->createQueryBuilder('u')->orderBy('u.nom', 'ASC');
                }

            ])

            ->add('nomMarque')
            ->add('pays', EntityType::class, [
                'class' => Pays::class,
                'choice_label' => 'id',
            ])
            ->add('fabricants', EntityType::class, [
                'class' => Fabricant::class,
                'choice_label' => 'id',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Marque::class,
        ]);
    }
}
