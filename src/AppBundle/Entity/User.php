<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;


/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\User")
 * 
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=false)
     */
	protected $first_name;
	
	/**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=false)
     */
	protected $last_name;

	
	
    public function __construct()
    {
        parent::__construct();
    }

	
	public function getFirstName()
	{
		return $this->first_name;
	}
	
	public function getLastName()
	{
		return $this->last_name;
	}
	
	
	/**
	 *
	 * @return type
	 */
	public function __toString()
	{
		return trim( $this->first_name . ' ' . $this->last_name );
		//return $this->username;
	}
}
