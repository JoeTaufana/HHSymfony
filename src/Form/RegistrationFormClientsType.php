<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\ClientsType;
use App\Form\RegistrationFormType;
use App\Entity\Clients;
use App\Entity\User;


class RegistrationFormClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class)
            ->add('nom', TextType::class)
            ->add('telephone', TextType::class)
            ->add('optInSms', CheckboxType::class)
            ->add('optInMail', CheckboxType::class)
            ->add('dateNaissance', BirthdayType::class)
            ->add('nombreEnfant', IntegerType::class)
            ->add('save', SubmitType::class)
            ->add('user', RegistrationFormType::class)
            
        // Ceci est un exemple de comment enlever des fields à profile
        ->get('user')
           ->remove('agreeTerms');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'validation_groups' => 'register'
        ]);
    }
}
