 /* client et fournisseurs par ville **/
SELECT `Clients`.`Ville`, `Clients`.`Société`, `Clients`.`Contact`, "Clients" AS Relation 
	FROM `Clients`
UNION 
	SELECT `Fournisseurs`.`Ville`, `Fournisseurs`.`Société`, `Fournisseurs`.`Contact`, "Fournisseurs"
	FROM `Fournisseurs`
ORDER BY `Ville`, `Société` asc;

/*vente pour 1997  **/
CREATE VIEW `Ventes pour 1997`  AS
SELECT `Catégories`.`Nom de catégorie`, `Produits`.`Nom du produit`, 
		Sum((`Détails commandes`.`Prix unitaire`*`Quantité`*(1-`Remise (%)`)/100)*100) AS VentesProduit, 
		"Tr " + QUARTER(`Date envoi`) AS TrimestreEnvoi
 		FROM `Catégories` 
		INNER JOIN `Produits` 
		        ON `Catégories`.`Code catégorie` = `Produits`.`Code catégorie`
		INNER JOIN `Détails commandes` 
				ON `Produits`.`Réf produit` = `Détails commandes`.`Réf produit`
	    INNER JOIN `Commandes`
		     	ON `Commandes`.`N° commande` = `Détails commandes`.`N° commande`
WHERE (((`Commandes`.`Date envoi`) Between date('1997/1/1') And date('1997/12/31')))
GROUP BY `Catégories`.`Nom de catégorie`, `Produits`.`Nom du produit`, "Tr " +  QUARTER(`Date envoi`)
order by `VentesProduit` asc;

/* sous totaux commande **/
CREATE VIEW `Sous-totaux commandes`  AS
    SELECT `Détails commandes`.`N° commande`, Sum((`Prix unitaire`*`Quantité`*(1-`Remise (%)`)/100)*100) AS SousTotal
    FROM `Détails commandes` GROUP BY `Détails commandes`.`N° commande`;

/* vente par presentant par pays **/
--PARAMETERS [Date début] DateTime, [Date fin] DateTime;
SELECT `Employés`.`Pays`, `Employés`.`Nom`, `Employés`.`Prénom`,
 `Commandes`.`Date envoi`, `Commandes`.`N° commande`, `Sous-totaux commandes`.`SousTotal` AS MontantVente
FROM `Employés`
  INNER JOIN `Commandes` 
	ON `Employés`.`N° employé`= Commandes.`N° employé`
  INNER JOIN `Sous-totaux commandes`
	ON `Commandes`.`N° commande` = `Sous-totaux commandes`.`N° commande`
WHERE (((`Commandes`.`Date envoi`) Between date('1997/1/1') And date('2017/1/1')))
order by `MontantVente` asc;

/*vente par categorie pour 1997 **/
SELECT `Ventes pour 1997`.`Nom de catégorie`, Sum(`Ventes pour 1997`.`VentesProduit`) AS `SommeDesVentes`
FROM `Ventes pour 1997`
GROUP BY `Ventes pour 1997`.`Nom de catégorie`
order by `SommeDesVentes` asc;

/* vente par categorie **/ -- Détails commandes complets est une vue qui doit etre creer  au prealable
SELECT `Catégories`.`Code catégorie`, `Catégories`.`Nom de catégorie`, `Produits`.`Nom du produit`,
 Sum(`Détails commandes complets`.`PrixTotal`) AS `VentesProduit`
FROM `Catégories` 
	INNER JOIN `Produits`
			 ON `Catégories`.`Code catégorie` = `Produits`.`Code catégorie`
	INNER JOIN `Détails commandes complets`
			 ON `Produits`.`Réf produit` = `Détails commandes complets`.`Réf produit`
	INNER JOIN `Commandes` 
	        ON `Commandes`.`N° commande` = `Détails commandes complets`.`N° commande`
WHERE (((`Commandes`.`Date commande`) Between date('1/1/1997') And date('12/31/1997')))
GROUP BY `Catégories`.`Code catégorie`, `Catégories`.`Nom de catégorie`, `Produits`.`Nom du produit`
ORDER BY `VentesProduit` asc;

/* vente annuelle **/ -- date debut et date fin par parametre
SELECT `Commandes`.`Date envoi`, `Commandes`.`N° commande`, `Sous-totaux commandes`.`SousTotal`, DATE_FORMAT(`Date envoi`, "%Y") AS `Année`
FROM `Commandes` 
INNER JOIN  `Sous-totaux commandes`
  ON `Commandes`.`N° commande` = `Sous-totaux commandes`.`N° commande`
WHERE (((`Commandes`.`Date envoi`) Is Not Null
 And (`Commandes`.`Date envoi`) Between date('1997/01/01') And date('2017/01/01')))
order by  `Sous-totaux commandes`.`SousTotal` asc;

/* requette1**/
SELECT `Employés`.`Nom`, `Employés`.`Prénom`, `Commandes`.`Date commande`, `Détails commandes`.`Prix unitaire`,
`Détails commandes`.`Quantité`, `Prix unitaire`*`Quantité` AS `Tot`
FROM `Employés` 
INNER JOIN `Commandes` 
	 ON Employés.`N° employé` = `Commandes`.`N° employé`
INNER JOIN `Détails commandes`
	ON Commandes.`N° commande` = `Détails commandes`.`N° commande`
order by `Tot` asc;

/* req commandes **/
SELECT `Commandes`.`N° commande`, `Commandes`.`Code client`, `Commandes`.`N° employé`, `Commandes`.`Date commande`,
`Commandes`.`À livrer avant`, `Commandes`.`Date envoi`, `Commandes`.`N° messager`,`Commandes`.`Port`,`Commandes`.`Destinataire`,
`Commandes`.`Adresse livraison`, `Commandes`.`Ville livraison`, `Commandes`.`Région livraison`, `Commandes`.`Code postal livraison`,
`Clients`.`Ville`, `Clients`.`Région`, `Clients`.`Code postal`, `Clients`.`Pays`,`Commandes`.`Pays livraison`, `Clients`.`Société`, `Clients`.`Adresse`
FROM `Clients` 
INNER JOIN `Commandes` 
	ON `Clients`.`Code client` = `Commandes`.`Code client`
order by `Commandes`.`Port` asc;

/* produits superieur moyenne prix**/
SELECT `Produits`.`Nom du produit`, `Produits`.`Prix unitaire`
FROM `Produits`
WHERE (((`Produits`.`Prix unitaire`)>(SELECT AVG(`Prix unitaire`) From `Produits`)))
ORDER BY `Produits`.`Prix unitaire` DESC;

/* produits par categorie **/
SELECT `Catégories`.`Nom de catégorie`, `Produits`.`Nom du produit`, 
        `Produits`.`Quantité par unité`, `Produits`.`Unités en stock`, `Produits`.`Indisponible`
FROM `Catégories` 
INNER JOIN `Produits` 
	ON `Catégories`.`Code catégorie` = `Produits`.`Code catégorie`
WHERE (((`Produits`.`Indisponible`)!="true"))
ORDER BY `Catégories`.`Nom de catégorie`, `Produits`.`Nom du produit` asc;

/* liste produits courant **/
SELECT  `Liste des produits`.`Réf produit`, `Liste des produits`.`Nom du produit`
FROM `Produits` AS `Liste des produits`
WHERE (((`Liste des produits`.`Indisponible`)='false'))
ORDER BY `Liste des produits`.`Nom du produit` asc;

/* list aplphabetique de produtis **/
SELECT `Produits`.*, `Catégories`.`Nom de catégorie`
FROM `Catégories` 
INNER JOIN `Produits`
	ON `Catégories`.`Code catégorie` =`Produits`.`Code catégorie`
WHERE (((`Produits`.`Indisponible`)='false'))
order by `Produits`.`Nom du produit` asc;

/* dix produits plus chers **/
SELECT  `Produits`.`Nom du produit` AS LesDixProduitsLesPlusChers, `Produits`.`Prix unitaire`
FROM Produits ORDER BY `Produits`.`Prix unitaire`  DESC limit 10;

/* facture **/
CREATE VIEW `Factures` as 
SELECT `Commandes`.`Destinataire`, `Commandes`.`Adresse livraison`, `Commandes`.`Ville livraison`, `Commandes`.`Région livraison`,
 `Commandes`.`Code postal livraison`, `Commandes`.`Pays livraison`,`Commandes`.`Code client`, `Clients`.`Société`,
 `Clients`.`Adresse`, `Clients`.`Ville`, `Clients`.`Région`, `Clients`.`Code postal`, `Clients`.`Pays`,`Employés`.`N° employé`, CONCAT(`Prénom` , ' ' , `Nom`)  AS Vendeur,
`Commandes`.`N° commande`, `Commandes`.`Date commande`, `Commandes`.`À livrer avant`, `Commandes`.`Date envoi`,
 `Messagers`.`Nom du messager`, `Détails commandes`.`Réf produit`, `Produits`.`Nom du produit`,
 `Détails commandes`.`Prix unitaire`, `Détails commandes`.`Quantité`, `Détails commandes`.`Remise (%)`*100 as 'Remise (%)',
 (`Détails commandes`.`Prix unitaire`*`Quantité`*(1-`Remise (%)`)/100)*100 AS PrixTotal, `Commandes`.`Port`
FROM `Produits` 
 INNER JOIN `Détails commandes`
	 ON Produits.`Réf produit`=`Détails commandes`.`Réf produit`
 INNER JOIN `Commandes` 
	ON Commandes.`N° commande`=`Détails commandes`.`N° commande` 
INNER JOIN `Messagers` 
	  ON Messagers.`N° messager`=`Commandes`.`N° messager`
 INNER JOIN `Employés`
		 ON Employés.`N° employé`=`Commandes`.`N° employé`
 INNER JOIN `Clients`
        ON Clients.`Code client`=`Commandes`.`Code client`
order by PrixTotal asc

/* filter facture **/ /* N° commande a saisi par l'utilisateur**/
SELECT `Factures`.* FROM `Factures` WHERE (((`Factures`.`N° commande`)='10462')) order by PrixTotal asc; 

