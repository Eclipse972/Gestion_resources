<?php
require'Modele/classe_Tableau.php'; // chargement de la classe mère

class TableauEntrepot extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_entrepot';
	$this->nomClasseLigne = 'Entrepot';
}

public function CréerFormulaireMAJ() {
	parent::DébutFormulaire('MAJEntrepot', ' de l&apos;entrp&ocirc;t', 'entrepot');
?>
	<div id="champ1">
		<label for="niveau">Niveau :</label>
		<input type="number" id="niveau" name="niveau" min="0" step="1" required>
	</div>
	<div id="champ2">
		<label for="stock">Stock</label>
		<input type="number" id="stock" name="stock" min="0" step="1" required>
	</div>
<?php
	parent::FinFormulaire();
}

public function TraiterFormulaireMAJ() {}

public function Afficher_tete() { parent::Afficher_thead(array('Entrep&ocirc;t', 'Niveau', 'Capacit&eacute;', 'Stock', 'Valeur')); }

}
