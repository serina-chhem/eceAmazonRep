<!DOCTYPE html>
<html>
<head>
	<title> ECE AMAZON : HOMEPAGE </title>
</head>
<body>
<!-- https://developer.mozilla.org/fr/docs/Web/HTML/Element/Input/checkbox -->

<form action="identificationAcheteur.php" method="post">
<fieldset>
  <legend>Veuillez sélectionner votre statut :</legend>
  <div>
    <input type="checkbox" id="acheteur" name="status" value="acheteur">
    <label for="acheteur">Acheteur</label>
  </div>
  <div>
    <input type="checkbox" id="vendeur" name="status" value="vendeur">
    <label for="vendeur">Vendeur</label>
  </div>
  <div>
    <input type="checkbox" id="admin" name="status" value="admin">
    <label for="admin">Admin</label>
  </div>
  <div>
      <button type="submit">Valider</button>
    </div>
</fieldset>
</form>


</body>
</html>