<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CandidatType extends AbstractType
{
    // Formulaire de la page rejoindre-krom.
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, array('attr' => array('placeholder' =>
                'Ex : Dupont'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre nom.")))))

            ->add('prenom', TextType::class, array('attr' => array('placeholder' =>
                'Ex : Pierre'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre prénom.")))))

            ->add('age', TextType::class, array('attr' => array('placeholder' =>
                'Ex : 21'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre âge.")))))

            ->add('plateforme', TextType::class, array('attr' => array('placeholder' =>
                'Ex : PC, console, etc.'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre plateforme.")))))

            ->add('simulation', TextType::class, array('attr' => array('placeholder' =>
                'Ex : iRacing, Assetto Corsa, etc.'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre simulation.")))))

            ->add('presentation', TextareaType::class, array('attr' => array('placeholder' =>
                'Présentez-vous globalement. Si vous en avez un, donnez-nous quelques détails sur votre palmarès. Expliquez-nous ce qui vous motive et les objectifs que vous souhaitez atteindre en rejoignant nos rangs.'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre présentation.")))))

            ->add('materiel', TextType::class, array('attr' => array('placeholder' =>
                'Votre PC, volant, pédalier, etc...'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre matériel.")))))

            ->add('mail', TextType::class, array('attr' => array('placeholder' =>
                'Ex : pierre.dupont@gmail.com'), 'constraints' => array(new NotBlank(array("message" => "Merci de
            renseigner votre email.")))))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
