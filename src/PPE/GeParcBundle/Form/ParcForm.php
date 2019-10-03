<?php


namespace PPE\GeParcBundle\Form;

namespace PPE\GeParcBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;




class ParcForm extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
               ->add('Description')
                ->add('EspaceMax')
                ->add('Adresse')
                
                ;
                
                
                
    }
    
    public function getName(){
        return 'Parc';
    }
}
