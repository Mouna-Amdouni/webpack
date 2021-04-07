<?php


namespace App\Form;


use App\Entity\Role;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditProfile extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add("username", TextType::class)
            ->add("email", EmailType::class)
            ->add("nomComplet", TextType::class)
            ->add("justpassword", TextType::class, [

                "required" => true,
                "mapped" => false,
                "constraints" => [
                    new NotBlank(["message" => 'aaaaaaaaaaa'])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
