<?php
Class Abonnement{
	private $id;
	private $prix;
	private $nom;
	private $typeAb; /** setType getType fonction prédéfinis en php   */
	private $valeur;

	public function __construct()
	{
	}
	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getPrix()
	{
		return $this->prix;
	}

	/**
	 * @param mixed $prix
	 */
	public function setPrix($prix)
	{
		$this->prix = $prix;
	}

	/**
	 * @return mixed
	 */
	public function getTypeAb()
	{
		return $this->typeAb;
	}

	/**
	 * @param mixed $typeAb
	 */
	public function setTypeAb($typeAb)
	{
		$this->typeAb = $typeAb;
	}

	/**
	 * @return mixed
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * @param mixed $nom
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	/**
	 * @return mixedre
	 */
	public function getValeur()
	{
		return $this->valeur;
	}

	/**
	 * @param mixed $valeur
	 */
	public function setValeur($valeur)
	{
		$this->valeur = $valeur;
	}


	function __toString()
	{
		// TODO: Implement __toString() method.
		return "Abonnement:{Id:" . $this->getId() . ",Name:  " .$this->getNom().",Price: ".$this->getPrix().",Type :".$this->getTypeAb().",Value :".$this->getValeur()."}";
	}
}
$ab= new  Abonnement();
$ab->setId(1);
$ab->setNom("Normal");
$ab->setPrix(50);
$ab->setTypeAb("1 Mois");
$ab->setValeur(50);
echo $ab;


?>