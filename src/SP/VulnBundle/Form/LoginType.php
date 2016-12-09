<?php
/**
 * Created by PhpStorm.
 * User: sprudnikov
 * Date: 09.12.2016
 * Time: 12:40
 */

namespace SP\VulnBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('userName', TextType::class);
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
        return 'vuln_bundle_login';
    }
}