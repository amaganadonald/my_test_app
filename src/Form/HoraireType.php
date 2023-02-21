<?php

namespace App\Form;

use App\Entity\HoraireSettings;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class HoraireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr'=> [
                    'class'=>'form-control',
                    'minlength'=>'2',
                    'maxlength'=>'50'
                ],
                'label' => 'Nom de Horaire',
                'label_attr' => [
                    'class'=>'form-label mt-2'
                ],
                'constraints'=>[
                    new Assert\Length(['min'=>2, 'max'=>50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('description', TextType::class, [
                'attr'=>[
                    'class'=>'form-control',
                    'minlength'=>'2',
                    'maxlength'=>'100'
                ],
                'label'=>'Description',
                'label_attr'=>[
                    'class'=>'form-label mt-2'
                ],
                'constraints'=>[
                    new Assert\Length(['min'=>2, 'max'=>100])
                ]
            ])
            ->add('entree', TimeType::class, [
                'attr'=>['class'=>'form-control'],
                'label'=>'Heure Arrivée',
                'label_attr'=>['class'=>'form-label mt-2']
            ])
            ->add('ExitBreak', TimeType::class, [
                'attr'=>['class'=>'form-control'],
                'label'=>'Heure Sortie Pause',
                'label_attr'=>['class'=>'form-label mt-2']
            ])
            ->add('ReturnBreak', TimeType::class, [
                'attr'=>['class'=>'form-control'],
                'label'=>'Heure Retour Pause',
                'label_attr'=>['class'=>'form-label mt-2']
            ])
            ->add('ExitWork', TimeType::class, [
                'attr'=>['class'=>'form-control'],
                'label'=>'Heure Fin Travail',
                'label_attr'=>['class'=>'form-label mt-2']
            ])
            ->add('submit', SubmitType::class, [
                'attr'=>[
                    'class'=>'btn btn-primary'
                ],
                'label'=>'Créer nouvel Horaire'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HoraireSettings::class,
        ]);
    }
}
