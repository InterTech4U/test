<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", uniqueConstraints={@ORM\UniqueConstraint(name="nip", columns={"nip"})}, indexes={@ORM\Index(name="FK_client_type_of_client", columns={"id_type_of_client"}), @ORM\Index(name="FK_client_user", columns={"id_user_add"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\Client")
 * 
 */
class Client
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="nip", type="string", length=25, nullable=false)
     */
    private $nip;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="post_code", type="string", length=10, nullable=false)
     */
    private $postCode;

    /**
     * @var \TypeOfClient
     *
     * @ORM\ManyToOne(targetEntity="TypeOfClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_of_client", referencedColumnName="id")
     * })
     */
    private $idTypeOfClient;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user_add", referencedColumnName="id")
     * })
     */
    private $idUserAdd;



	

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
     * @return Client
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
     * Set name
     *
     * @param string $name
     *
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nip
     *
     * @param string $nip
     *
     * @return Client
     */
    public function setNip($nip)
    {
        $this->nip = $nip;

        return $this;
    }

    /**
     * Get nip
     *
     * @return string
     */
    public function getNip()
    {
        return $this->nip;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Client
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Client
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     *
     * @return Client
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set idTypeOfClient
     *
     * @param \AppBundle\Entity\TypeOfClient $idTypeOfClient
     *
     * @return Client
     */
    public function setIdTypeOfClient(\AppBundle\Entity\TypeOfClient $idTypeOfClient = null)
    {
        $this->idTypeOfClient = $idTypeOfClient;

        return $this;
    }

    /**
     * Get idTypeOfClient
     *
     * @return \AppBundle\Entity\TypeOfClient
     */
    public function getIdTypeOfClient()
    {
        return $this->idTypeOfClient;
    }

    /**
     * Set idUserAdd
     *
     * @param \AppBundle\Entity\User $idUserAdd
     *
     * @return Client
     */
    public function setIdUserAdd(\AppBundle\Entity\User $idUserAdd = null)
    {
        $this->idUserAdd = $idUserAdd;

        return $this;
    }

    /**
     * Get idUserAdd
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUserAdd()
    {
        return $this->idUserAdd;
    }
	
	
	/**
	 *
	 * @return type
	 */
	public function __toString()
	{
		return $this->name;
	}
}
