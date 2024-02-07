<?php

namespace App\Form;

use App\Entity\Clients;

use App\Form\UserType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//use Symfony\Component\Form\Extension\Core\Type\DateType;


class ClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
            ])
            ->add('optInSms', CheckboxType::class, [
                'label' => 'Rappel SMS  ',
                'required' => false,
            ])
            ->add('optInMail', CheckboxType::class, [
                'label' => 'Option Email  ',
                'required' => false,
            ])
            ->add('dateNaissance', BirthdayType::class, [
                'label' => 'Date de Naissance',
                'widget' => 'single_text',
            ])
            ->add('nombreEnfant', IntegerType::class, [
                'label' => 'Nombre d\'enfants',
                'required' => false,
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
