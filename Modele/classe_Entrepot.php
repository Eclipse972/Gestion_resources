<?php
class Entrepot extends LigneTableau {

public function __construct() {
	$this->table = 'entrepot';
	$this->nomChampID = 'marchandise_ID';
	$this->onglet = 'entrepots';
	$this->IDmin = 2;
	$this->IDmax = 60;
}

public function AfficherRapport() {
?>
	<h1>Les besoins</h1>
	<p><?=$Tvariables['besoin']?></p>

	<h1>Am&eacute;lioration</h1>
	<p><?=$Tvariables['amelioration']?></p>
	<a class="infobulle"><h1>Divers</h1>
	<span>
<?php
	echo $this->UtilePour($this->ID);
	echo $this->Obtenir($this->ID);
?>
	</span></a>
<?php
}

}
