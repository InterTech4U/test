<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use AppBundle\Entity\Task;

class StatisticsService{

	protected $em;
	protected $container;
	

    public function __construct( EntityManager $em, Container $container )
    {
        $this->em = $em;
		$this->container = $container;
    }
	
	
	/**
     * Zwraca procent wdrożenia (ilość zrealizowanych zadań vs. ilość wszystkich zadań)
     *
     * @return string
     */
	public function percentOfImplementation( $projectId = 0, $typeOfValue = 'float' )
	{
		$projectId = intval($projectId);
		$percent = '---';
		
		$allTasks = $this->countTask( $projectId );
		$finishedTasks = $this->countTask( $projectId, $this->container->getParameter('id_status_task_closed') );
		
		if( $allTasks > 0 )
		{
			$percent = $finishedTasks * 100 / $allTasks; 
			if( $typeOfValue == '%' )
			{
				$percent .= '%';
			}
		}
		
		return $percent;
	}
	
	
	public function countTask( $projectId = 0, $statusId = 0 ){
		$count = 0;
		$projectId = intval($projectId);
		$statusId = intval($statusId);
		
		$findByArray = array();
		if( $projectId > 0 )
		{
			$findByArray['idProject'] = $projectId;
		}
		
		if( $statusId > 0 )
		{
			$findByArray['idStatusOfTask'] = $statusId;
		}
		
        $projects = $this->em->getRepository('AppBundle:Task')->findBy( $findByArray );
		
		return count($projects);
	}
}
