<?php

namespace PPE\PpeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class VehiculeCommercialeForm extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Marque')
                ->add('NbrPlace', ChoiceType::class, array('choices'   => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',)))
                ->add('NumImmatricule')
                ->add('Kilomtetrage')
                ->add('Modele')
                ->add('DateDachat')
                ->add('Carburant')
                ->add('EtatVehicule')
                ->add('PuissanceFiscale')
                ->add('PuissanceMecanique')
                ->add('Disponibilite', ChoiceType::class, array('choices'=> array('Disponible' => 'Disponible', 'Non Disponible' => 'Non Disponible'),))
                ->add('parc', EntityType::class,array('class'=>'PPE\GeParcBundle\Entity\Parc'))
                ->add('Commerce')
                
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPE\PpeBundle\Entity\VehiculeCommerciale'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ppe_ppebundle_vehicule';
    }


}
