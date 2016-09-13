<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('required' => true, 'label' => 'Nazwa'))
            ->add('description', null, array('required' => true, 'label' => 'Opis'))
            //->add('timestampAdd', 'datetime')
            ->add('idProject', null, array('required' => true, 'label' => 'Projekt'))
            ->add('idStatusOfTask', null, array('required' => true, 'label' => 'Status zadania'))
            //->add('idTask')
            ->add('assignToUser', null, array('required' => true, 'label' => 'Pracownik realizujący'))
			->add('priorytet', null, array('required' => true, 'label' => 'Priorytet [1 - 3]'))
		;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task'
        ));
    }
}
