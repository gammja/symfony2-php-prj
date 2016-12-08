<?php

namespace SP\VulnBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('userName', TextType::class);
        $builder->add('firstName', TextType::class);
        $builder->add('lastName', TextType::class);
        $builder->add('email', EmailType::class);
        $builder->add('description', TextareaType::class);
//        $builder->add('role', EmailType::class);
        $builder->add('password', PasswordType::class);
        $builder->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SP\VulnBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'vuln_bundle_user';
    }
}
