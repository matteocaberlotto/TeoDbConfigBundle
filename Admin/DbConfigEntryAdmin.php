<?php

namespace Teo\DbConfigBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

use Teo\DbConfigBundle\Manager\DbConfigEntryManager;

/**
 * Description of DbConfigEntryAdmin
 *
 * @author mcaberlotto
 */
class DbConfigEntryAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
        $collection->remove('show');
    }

    protected $datagridValues = array(
        '_page'       => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'created' // field name
    );

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('content', null, array('label'=>'Contenuto'))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('read_only' => true, 'label'=>'Nome'))
            ->add('content', null, array('label'=>'Contenuto'))
            ->remove('id')
            ->remove('created')
            ->remove('updated')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label'=>'Nome'))
            ->add('content', null, array('label' => 'Contenuto'))
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name', null, array('label'=>'Nome'))
            ->add('content', null, array('label' => 'Contenuto'))
        ;
    }
}
