 SELECT COUNT(dbo.EMPLOYER.IDVILLE) AS 'nombre d''employer',dbo.VILLE.DESCPRIPTION2 FROM EMPLOYER 
   LEFT JOIN dbo.VILLE ON VILLE.IDVILLE = EMPLOYER.IDVILLE -- les villes qui contiennent le nombre d'employer >= 7 
   AND 1=1 WHERE 7=7    
   GROUP BY  dbo.VILLE.DESCPRIPTION2
   HAVING COUNT(dbo.EMPLOYER.IDVILLE)>=7
   ORDER BY COUNT(dbo.EMPLOYER.IDVILLE) ASC 
-------------------------
SELECT EMPLOYER.*, VILLE.DESCPRIPTION2 FROM dbo.EMPLOYER -- les employer qui habite a casablanca
inner JOIN dbo.VILLE
  ON VILLE.IDVILLE = EMPLOYER.IDVILLE
WHERE dbo.VILLE.DESCPRIPTION2='casablanca'
--------------------------
SELECT * FROM dbo.EMPLOYER WHERE GENDER='h'  -- les employer homme
----------------------------

SELECT EMPLOYER.*,dbo.REMUNERATION.PRIME+dbo.REMUNERATION.SALAIRE AS 'Salaire net' FROM dbo.REMUNERATION --- les salaires net des employers
INNER JOIN  dbo.EMPLOYER 
ON EMPLOYER.IDEMPLOYER = REMUNERATION.IDEMPLOYER 
-------------------------
SELECT MAX (PRIME+SALAIRE) AS salaireMax FROM dbo.REMUNERATION  --les salaires les plus grands
------------------------------------
SELECT * FROM dbo.REMUNERATION WHERE PRIME+SALAIRE = (SELECT MAX(SALAIRE+PRIME) FROM dbo.REMUNERATION  )--les salaires les plus grands

-----------------------------
SELECT dbo.CLIENT.*, VILLE.DESCPRIPTION2 FROM dbo.CLIENT -- client casablancais
inner JOIN dbo.VILLE
ON VILLE.IDVILLE = dbo.CLIENT.IDVILLE
WHERE dbo.VILLE.DESCPRIPTION2='casablanca'
-------------
SELECT dbo.PROJET.IDPROJETS,dbo.PROJET.DESCRIPTION AS 'description projet', -- les projets et leurs taches avec les employés et responsables des projets
       TACHE.DESCRIPTION AS 'description tache',     dbo.TACHE.IDTACHE, dbo.PROJET.IDEMPLOYER AS 'responsable projet',dbo.TACHE.IDEMPLOYER AS 'employer tache'  FROM dbo.PROJET 
INNER JOIN dbo.TACHE ON TACHE.IDPROJETS = PROJET.IDPROJETS
WHERE PROJET.IDPROJETS=1

-----------------------
SELECT *,MONTANTHT+(MONTANTHT*(CONVERT(INT,TVA))/100) AS 'montant ttc' FROM dbo.FACTURE --  LES FACTURES
-------------------------------------
SELECT MAX(MONTANTHT+(MONTANTHT*(CONVERT(INT,TVA))/100) ) AS 'montant ttc'  ,dbo.FACTURE.IDCLIENT  FROM dbo.FACTURE  -- la facture la plus chaire 
GROUP BY dbo.FACTURE.IDCLIENT  
 -------------------------
 
 SELECT IDEMPLOYER FROM dbo.REMUNERATION WHERE (SALAIRE+PRIME) >= ALL (SELECT (SALAIRE+PRIME)  FROM dbo.REMUNERATION)-- max salaire 

----------------------------------
SELECT * FROM dbo.PROJET

SELECT * FROM dbo.EMPLOYER

SELECT *FROM dbo.FACTURE 
-----------------------
SELECT  *FROM dbo.EMPLOYER -- les equipes et leurs responsables
INNER JOIN dbo.EQUIPE
ON EQUIPE.IDEQUIPE = EMPLOYER.IDEQUIPE
WHERE GRADE=2

SELECT  TOP 3 *,MONTANTHT+(MONTANTHT*(CONVERT(INT,TVA))/100)  AS 'mantant ttc' FROM dbo.FACTURE ORDER BY MONTANTHT+(MONTANTHT*(CONVERT(INT,TVA))/100)  DESC  --les 3 premieres factures les plus chaires

-------------------------
SELECT *,DATEPART(YEAR,DATEFIN) FROM dbo.PROJET WHERE  DATEPART(YEAR,DATEFIN) ='2018'--- LES PROJET 2018
------------------------
SELECT * FROM dbo.CONGE WHERE DATEPART(YEAR,DATEASK)='2018' AND DATEPART(MONTH,DATEASK) IN (6,7,8) -- LES CONGE DEMANDE LES MOIS 6,7,8 EN 2018 

--------------------------------------------------
/** procedure stocke ***/
CREATE PROCEDURE getN_TopFacture -- procedure qui affiche le n facture les plus chaire
    @Nbr int = 1
AS
   SELECT  TOP (@Nbr) *,MONTANTHT+(MONTANTHT*(CONVERT(INT,TVA))/100)  AS 'mantant ttc' FROM dbo.FACTURE ORDER BY MONTANTHT+(MONTANTHT*(CONVERT(INT,TVA))/100)  DESC 

RETURN 0 

EXEC getN_TopFacture  @Nbr=5
--------------------
 
CREATE PROCEDURE get_employesVivreDansVille -- - les employer qui habite a une ville donne en parametre 
    @ville varchar(500)
AS
  
SELECT EMPLOYER.*, VILLE.DESCPRIPTION2 FROM dbo.EMPLOYER 
  INNER JOIN dbo.VILLE
  ON VILLE.IDVILLE = EMPLOYER.IDVILLE
WHERE dbo.VILLE.DESCPRIPTION2=@ville

RETURN 0 

EXEC get_employesVivreDansVille  @ville='rabat'                                                                                                                                                                                                                                                