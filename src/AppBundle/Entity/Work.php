<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 *
 * @ORM\Table(name="work", indexes={@ORM\Index(name="FK__task", columns={"id_task"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\Work")
 * 
 */
class Work
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp_add", type="datetime", nullable=false)
     */
    private $timestampAdd = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp_start", type="datetime", nullable=false)
     */
    private $timestampStart = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp_stop", type="datetime", nullable=false)
     */
    private $timestampStop = '0000-00-00 00:00:00';

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '0';

    /**
     * @var \Task
     *
     * @ORM\ManyToOne(targetEntity="Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_task", referencedColumnName="id")
     * })
     */
    private $idTask;



	public function __construct()
    {
        $this->timestampAdd = new \DateTime();
    }

	
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set timestampAdd
     *
     * @param \DateTime $timestampAdd
     *
     * @return Work
     */
    public function setTimestampAdd($timestampAdd)
    {
        $this->timestampAdd = $timestampAdd;

        return $this;
    }

    /**
     * Get timestampAdd
     *
     * @return \DateTime
     */
    public function getTimestampAdd()
    {
        return $this->timestampAdd;
    }

    /**
     * Set timestampStart
     *
     * @param \DateTime $timestampStart
     *
     * @return Work
     */
    public function setTimestampStart($timestampStart)
    {
        $this->timestampStart = $timestampStart;

        return $this;
    }

    /**
     * Get timestampStart
     *
     * @return \DateTime
     */
    public function getTimestampStart()
    {
        return $this->timestampStart;
    }

    /**
     * Set timestampStop
     *
     * @param \DateTime $timestampStop
     *
     * @return Work
     */
    public function setTimestampStop($timestampStop)
    {
        $this->timestampStop = $timestampStop;

        return $this;
    }

    /**
     * Get timestampStop
     *
     * @return \DateTime
     */
    public function getTimestampStop()
    {
        return $this->timestampStop;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Work
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set idTask
     *
     * @param \AppBundle\Entity\Task $idTask
     *
     * @return Work
     */
    public function setIdTask(\AppBundle\Entity\Task $idTask = null)
    {
        $this->idTask = $idTask;

        return $this;
    }

    /**
     * Get idTask
     *
     * @return \AppBundle\Entity\Task
     */
    public function getIdTask()
    {
        return $this->idTask;
    }
}
