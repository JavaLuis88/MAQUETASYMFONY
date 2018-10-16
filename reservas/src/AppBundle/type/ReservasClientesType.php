<?php

namespace AppBundle\type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\ReservasClientes;
use AppBundle\Entity\MediosDePago;

class ReservasClientesType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('id', HiddenType::class);
        $builder->add('nombre', TextType::class, array('required' => true, 'label_format' => 'nombre','attr'=>array('class'=>'form-control')));
        $builder->add('apellidos', TextType::class, array('required' => true, 'label_format' => 'apellidos','attr'=>array('class'=>'form-control')));
        $builder->add('direccion', TextType::class, array('required' => true, 'label_format' => 'direccion','attr'=>array('class'=>'form-control')));
        $builder->add('mediopago', EntityType::class, array('class' => 'AppBundle:MediosDePago','choice_label' => 'nombre','label_format' => 'medio.de.pago','attr'=>array('class'=>'form-control')));
        $builder->add('save', SubmitType::class,array('label_format' => 'reservar','attr'=>array('class'=>'btn btn-primary')));
      
        
        
    }

   
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ReservasClientes::class
        ));
    }
    

}
