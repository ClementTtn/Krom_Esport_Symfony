<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
{
    // Formulaire de la page contact.
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('identite', TextType::class, array('attr' => array('placeholder' =>
                'Votre email'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre email.")))))

            ->add('message', TextareaType::class, array('attr' => array('placeholder' =>
                'Votre message'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre message.")))));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
