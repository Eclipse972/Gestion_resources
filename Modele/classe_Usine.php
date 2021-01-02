<?php
class Usine extends LigneTableau {

public function __construct() {
	$this->table = 'usine';
	$this->nomChampID = 'type_usine_ID';
	$this->onglet = 'usines';
	$this->IDmin = 0;
	$this->IDmax = 22;
}

protected function ProductionActuelle() {
	$production = $this->InterrogerBD("SELECT prodEnCours, dureeProd FROM Vue_usine WHERE IDjoueur = :IDjoueur AND ID = :ID"
											, array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	$T_ligneBD = $this->InterrogerBD("SELECT code FROM Vue_usine_production_ingredients WHERE joueur_ID = :IDjoueur AND ID = :ID"
										,array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	if ($production[0]['dureeProd'] == 0) $code = '';
	else {
		ob_start();
?>
		<h1>Production actuelle</h1>
		<p>La production de <?=$production[0]['prodEnCours']?> a n&eacute;cessit&eacute; :</p>
		<table id="production">
		<thead><tr><th>Marchandise</th><th>Quantit&eacute;</th></tr></thead>
		<tbody>
<?php	foreach($T_ligneBD as $ligne) echo $ligne['code'];	?>
		</tbody>
		</table>
<?php
		$code = ob_get_contents();
		ob_end_clean();
	}
	return $code;
}

public function AfficherRapport() {
	$ligne = $this->InterrogerBD("SELECT formule FROM Vue_recette WHERE ID = :ID", array(':ID'=>$this->ID));
?>		<p>Formule : <?=$ligne[0]['formule']?></p>
<?=$this->ProductionActuelle()?>
	<h1>Prochaine production</h1>
<?php
	$production = $this->InterrogerBD("SELECT * FROM Vue_usine_prochaineProduction WHERE IDjoueur = :IDjoueur AND ID = :ID"
											, array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
?>
	<p>Besoins pour la production de <?=$production[0]['prochaineProd']?> (dur&eacute;e <?=$production[0]['duréeProductinoSouhaitée']?>) :</p>
	<p>En construction: formulaire avec durée/Quantité + date de début + bouton de validation</p>

	<h1>Autosuffisance</h1>
	<p>Tendance</p>
	<p>la production suffit-elle pour les besoins internes</p>
	<p>les usines peuvent elles assurer les besoins pour produire</p>

	<h1>Am&eacute;lioration d&apos;usine</h1>
	<table id="amelioration">
	<thead><tr><th>Marchandise</th><th>Quantit&eacute;</th><th>stock</th><th>manque</th><th>PU</th><th>achat</th></tr></thead>
	<tbody>
<?php
$T_ligneBD = $this->InterrogerBD("SELECT code FROM Vue_usine_amelioration_ingredients WHERE joueur_ID = :IDjoueur AND ID = :ID"
									, array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	foreach($T_ligneBD as $ligne) echo $ligne['code'];
	// coût des marchandises
	$rechercheCout = $this->InterrogerBD("SELECT SUM(achat) AS somme FROM Vue_usine_amelioration_ingredients WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	$coutIngrédients = $rechercheCout[0]['somme'];
	$taux = 5; // taux en % des frais de transport à rechercher dans la BD
	// coût fixe
	$rechercheCoutFixe = $this->InterrogerBD("SELECT somme FROM Vue_usine_amelioration_coutFixe WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	$coutFixe = $rechercheCoutFixe[0]['somme'];
?>
		<tr><td colspan="5" style="text-align:right">Total =</td><td><?=number_format($coutIngrédients, 0, ',',' ')?></td></tr>
		<tr><td colspan="5" style="text-align:right"><?=$taux?>% de frais de transport =</td><td><?=number_format($coutIngrédients*$taux/100, 0, ',',' ')?></td></tr>
		<tr><td colspan="5" style="text-align:right">Frais divers =</td><td><?=number_format($coutFixe, 0, ',',' ')?></td></tr>
		<tr><td colspan="5" style="text-align:right">CO&Ucirc;T TOTAL =</td><td><?=number_format($coutIngrédients*(1+$taux/100) + $coutFixe, 0, ',',' ')?></td></tr>
	</tbody>
	</table>
	<p>ordre am&eacute;lioration et délai</p>
<?php
}

}
