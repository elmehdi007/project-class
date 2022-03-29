/*==============================================================*/
/* Nom de SGBD :  Microsoft SQL Server 2008                     */
/* Date de création :  3/8/2018 5:20:57 PM                      */
/*==============================================================*/

if exists (select 1
          from sysobjects
          where id = object_id('CLR_TRIGGER_FACTURE')
          and type = 'TR')
   drop trigger CLR_TRIGGER_FACTURE
go

CREATE DATABASE enteprise 


/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT (
   IDCLIENT             int                  not null,
   IDVILLE              smallint             not null,
   NOM                  char(20)             null,
   ADRESSE              char(200)            null,
   FIX                  char(20)             null,
   FAX                  char(20)             null,
   TEL                  char(20)             null,
   constraint PK_CLIENT primary key nonclustered (IDCLIENT)
)
go

/*==============================================================*/
/* Index : SITUER_FK                                            */
/*==============================================================*/
create index SITUER_FK on CLIENT (
IDVILLE ASC
)
go

/*==============================================================*/
/* Table : CONGE                                                */
/*==============================================================*/
create table CONGE (
   IDCONGE              int                  not null,
   IDEMPLOYER           int                  not null,
   DATEASK              datetime             null,
   LABELE               char(2000)           null,
   DATEDEBUT            datetime             null,
   DATEFIN              datetime             null,
   constraint PK_CONGE primary key nonclustered (IDCONGE)
)
go

/*==============================================================*/
/* Index : DEMANDE_FK                                           */
/*==============================================================*/
create index DEMANDE_FK on CONGE (
IDEMPLOYER ASC
)
go

/*==============================================================*/
/* Table : EMPLOYER                                             */
/*==============================================================*/
create table EMPLOYER (
   IDEMPLOYER           int                  not null,
   IDVILLE              smallint             not null,
   IDEQUIPE             int                  not null,
   CIN                  char(8)              null,
   NOM                  char(20)             null,
   PRENOM               char(20)             null,
   DATENAISSANCE        datetime             null,
   ADRESSE              char(200)            null,
   FIX                  char(20)             null,
   DATEEMBAUCHE         datetime             null,
   SALAIREDENTER        money             null,
   GRADE                smallint             null,
   NUMCOMPTE            int                  null,
   GENDER               char(1)              null,
   constraint PK_EMPLOYER primary key nonclustered (IDEMPLOYER)
)
go

/*==============================================================*/
/* Index : HABITE_FK                                            */
/*==============================================================*/
create index HABITE_FK on EMPLOYER (
IDVILLE ASC
)
go

/*==============================================================*/
/* Index : RELATION_7_FK                                        */
/*==============================================================*/
create index RELATION_7_FK on EMPLOYER (
IDEQUIPE ASC
)
go

/*==============================================================*/
/* Table : EQUIPE                                               */
/*==============================================================*/
create table EQUIPE (
   IDEQUIPE             int                  not null,
   DESCPRIPTION         char(256)            null,
   constraint PK_EQUIPE primary key nonclustered (IDEQUIPE)
)
go

/*==============================================================*/
/* Table : EVENT                                                */
/*==============================================================*/
create table EVENT (
   IDEVENT              int                  not null,
   IDVILLE              smallint             not null,
   IDEMPLOYER           int                  not null,
   DATEDEBUT            datetime             null,
   DESCRIPTION          char(700)            null,
   DATEFIN              datetime             null,
   constraint PK_EVENT primary key nonclustered (IDEVENT)
)
go

/*==============================================================*/
/* Index : ORGANISE_FK                                          */
/*==============================================================*/
create index ORGANISE_FK on EVENT (
IDEMPLOYER ASC
)
go

/*==============================================================*/
/* Index : LOCALISATION_FK                                      */
/*==============================================================*/
create index LOCALISATION_FK on EVENT (
IDVILLE ASC
)
go

/*==============================================================*/
/* Table : FACTURE                                              */
/*==============================================================*/
create table FACTURE (
   IDFACTURE            int                  not null,
   IDPROJETS            int                  null,
   IDCLIENT             int                  not null,
   MONTANTHT            smallint             null,
   TVA                  smallint             null,
   DESCRIPTION          char(700)            null,
   DATE                 datetime             null,
   constraint PK_FACTURE primary key nonclustered (IDFACTURE)
)
go

/*==============================================================*/
/* Index : CORESPONDANT_FK                                      */
/*==============================================================*/
create index CORESPONDANT_FK on FACTURE (
IDCLIENT ASC
)
go

/*==============================================================*/
/* Index : FACTUER2_FK                                          */
/*==============================================================*/
create index FACTUER2_FK on FACTURE (
IDPROJETS ASC
)
go

/*==============================================================*/
/* Table : MATERIEL                                             */
/*==============================================================*/
create table MATERIEL (
   IDMATERIEL           int                  not null,
   DESCRIPTION          char(700)            null,
   constraint PK_MATERIEL primary key nonclustered (IDMATERIEL)
)
go

/*==============================================================*/
/* Table : PAYS                                                 */
/*==============================================================*/
create table PAYS (
   IDCONTRY             smallint             not null,
   DESCPRIPTION2        char(256)            null,
   constraint PK_PAYS primary key nonclustered (IDCONTRY)
)
go

/*==============================================================*/
/* Table : PROJET                                               */
/*==============================================================*/
create table PROJET (
   IDPROJETS            int                  not null,
   IDEMPLOYER           int                  not null,
   DATEDEBUT            datetime             null,
   DATEFIN              datetime             null,
   DESCRIPTION          char(700)            null,
   TYPE                 char(200)            null,
   constraint PK_PROJET primary key nonclustered (IDPROJETS)
)
go

/*==============================================================*/
/* Index : RESPONSABLE_FK                                       */
/*==============================================================*/
create index RESPONSABLE_FK on PROJET (
IDEMPLOYER ASC
)
go

/*==============================================================*/
/* Table : REMUNERATION                                         */
/*==============================================================*/
create table REMUNERATION (
   IDREMUNERATION       int                  not null,
   IDEMPLOYER           int                  not null,
   NBRWORKHOUR          smallint             null,
   DESCRIPTION          char(700)            null,
   PRIME                money                null,
   SALAIRE              money                null,
   DATE                 datetime             null,
   constraint PK_REMUNERATION primary key nonclustered (IDREMUNERATION)
)
go

/*==============================================================*/
/* Index : AVOIR_FK                                             */
/*==============================================================*/
create index AVOIR_FK on REMUNERATION (
IDEMPLOYER ASC
)
go

/*==============================================================*/
/* Table : TACHE                                                */
/*==============================================================*/
create table TACHE (
   IDTACHE              int                  not null,
   IDEMPLOYER           int                  null,
   IDPROJETS            int                  not null,
   DESCRIPTION          char(700)            null,
   DATEDEBUT            datetime             null,
   DATEFIN              datetime             null,
   constraint PK_TACHE primary key nonclustered (IDTACHE)
)
go

/*==============================================================*/
/* Index : COMPOSE_FK                                           */
/*==============================================================*/
create index COMPOSE_FK on TACHE (
IDPROJETS ASC
)
go

/*==============================================================*/
/* Index : FAIT_FK                                              */
/*==============================================================*/
create index FAIT_FK on TACHE (
IDEMPLOYER ASC
)
go

/*==============================================================*/
/* Table : UTILISE                                              */
/*==============================================================*/
create table UTILISE (
   IDEVENT              int                  not null,
   IDMATERIEL           int                  not null,
   DESCRIPTION          char(700)            null,
   constraint PK_UTILISE primary key (IDEVENT, IDMATERIEL)
)
go

/*==============================================================*/
/* Index : UTILISE_FK                                           */
/*==============================================================*/
create index UTILISE_FK on UTILISE (
IDEVENT ASC
)
go

/*==============================================================*/
/* Index : UTILISE2_FK                                          */
/*==============================================================*/
create index UTILISE2_FK on UTILISE (
IDMATERIEL ASC
)
go

/*==============================================================*/
/* Table : VILLE                                                */
/*==============================================================*/
create table VILLE (
   IDVILLE              smallint             not null,
   IDCONTRY             smallint             not null,
   DESCPRIPTION2        char(256)            null,
   constraint PK_VILLE primary key nonclustered (IDVILLE)
)
go

/*==============================================================*/
/* Index : APPPARTIENT_FK                                       */
/*==============================================================*/
create index APPPARTIENT_FK on VILLE (
IDCONTRY ASC
)
go

/*==============================================================*/
/* constraint                                    */
/*==============================================================*/
ALTER TABLE employer
ADD CHECK (gender='f' OR gender='m');

ALTER TABLE employer
ADD CHECK (grade=1 OR grade=2 OR grade=3  )
 
ALTER TABLE ville
ADD CHECK (LEN(DESCPRIPTION2) >2)
 

 ALTER TABLE pays
ADD CHECK (LEN(DESCPRIPTION2) >2)

/*==============================================================*/
/* insertion  pays                                 */
/*==============================================================*/
 INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(1,'maroc')
  INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(2,'algerie')
  INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(3,'tunisie')
  INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(4,'egypte')
  INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(5,'moritanie')
 INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(6,'italy')
 INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(7,'france')
  INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(8,'united state')
  INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(9,'china')
  INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(10,'japon')
  INSERT INTO pays(IDCONTRY,DESCPRIPTION2) VALUES(11,'hangary')
  /*==============================================================*/
/* insertion  ville                                 */
/*==============================================================*/
INSERT INTO dbo.VILLE( IDVILLE, IDCONTRY, DESCPRIPTION2 )VALUES  ( 1, 1 , 'casablanca' )
INSERT INTO dbo.VILLE( IDVILLE, IDCONTRY, DESCPRIPTION2 )VALUES  ( 2, 1 , 'rabat' )
INSERT INTO dbo.VILLE( IDVILLE, IDCONTRY, DESCPRIPTION2 )VALUES  ( 3, 1 , 'el jadida' )
INSERT INTO dbo.VILLE( IDVILLE, IDCONTRY, DESCPRIPTION2 )VALUES  ( 4, 1 , 'marreckech' )
INSERT INTO dbo.VILLE( IDVILLE, IDCONTRY, DESCPRIPTION2 )VALUES  ( 5, 1 , 'tanger' )
INSERT INTO dbo.VILLE( IDVILLE, IDCONTRY, DESCPRIPTION2 )VALUES  ( 6, 1 , 'agadir' )
INSERT INTO dbo.VILLE( IDVILLE, IDCONTRY, DESCPRIPTION2 )VALUES  ( 7, 1 , 'khribga' )
INSERT INTO dbo.VILLE( IDVILLE, IDCONTRY, DESCPRIPTION2 )VALUES  ( 8, 1 , 'titwane' )

/*==============================================================*/
/* insertion  EQUIPE                                 */
/*==============================================================*/
INSERT dbo.EQUIPE( IDEQUIPE, DESCPRIPTION ) VALUES  (1, 'equipe developpeur web')
INSERT dbo.EQUIPE( IDEQUIPE, DESCPRIPTION ) VALUES  (2, 'equipe developpeur mobile')
INSERT dbo.EQUIPE( IDEQUIPE, DESCPRIPTION ) VALUES  ( 3, 'equipe web marketing')
INSERT dbo.EQUIPE( IDEQUIPE, DESCPRIPTION ) VALUES  ( 4, 'service financier')

/*==============================================================*/
/* insertion  employer                                 */
/*==============================================================*/
-- employer equipe developpeur

INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 1,1,1, 'BJ415741' , 'Alaoui' ,  'Ahmed' , '1970/01/01' ,  '22 rue jajj' ,'0522145785' , GETDATE() ,  '5000' , 3 ,  11144441 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 2,1,1, 'BK741359' , 'nom' ,  'Ahmed' , '1974/01/01' ,  '14 rue faaff' ,'0522135787' , GETDATE() ,  '5000' , 3 ,  22244441 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 3,1,1, 'BJ789523' , 'rbati' ,  'mohemde' , '1971/03/11' ,  '22 rue jajj' ,'0522745785' , GETDATE() ,  '6000' , 3 ,  212222 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 4,1,1, 'Bw789523' , 'fasi' ,  'jlail' , '1981/03/11' ,  '22 rue koppo' ,'0522745585' , GETDATE() ,  '6000' , 3 ,  55225 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 5,2,1, 'pp415741' , 'taganwi' ,  'kalil' , '1976/09/01' ,  '22 rue tanga' ,'0522345777' ,'2000/09/01',  '5000' , 3 ,  7411444 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 6,2,1, 'dK741359' , 'nom test' ,  'prenom test' , '1978/01/01' ,  '14 rue faaff' ,'0523135787' ,'2010/09/01',  '5000' , 3 ,  5555577 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 7,2,1, 'ml789523' , 'rbati' ,  'mohemde' , '1971/03/11' ,  '22 rue jajj' ,'0522745785' , '2011/09/09',  '6000' , 3 ,  85236 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 8,2,1, 'vw789523' , 'fasi' ,  'jlail' , '1981/03/11' ,  '22 rue koppo' ,'0522645585' ,'2012/09/01' ,  '6000' , 3 ,  3528855 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  (9,2,1, 'oo741682' , 'sahrawi' ,  'monir' , '1981/09/01' ,  '22 rue laayoun' ,'05225242777' ,'2005/09/01',  '5000' , 3 ,  22544122 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 10,2,1, 'gg524636' , 'nom test' ,  'prenom test' , '1978/01/01' ,  '14 rue faaff' ,'0523135787' ,'2007/09/01',  '5000' , 3 ,  774155 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 11,2,1, 'fg524636' , 'rbati' ,  'mohemde' , '1971/03/11' ,  '22 rue lol' ,'05225412785' , '2015/09/09',  '6000' , 3 ,  122544 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  (12,3,1, 'tt774622' , 'fassi' ,  'hamza' , '1986/09/01' ,  '22 rue fss' ,'05741441' ,'2009/09/01',  '5000' , 3 ,  54135433 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 13,3,1, 'dd524146' , 'nom test' ,  'prenom test' , '1978/01/01' ,  '14 rue faaff' ,'05741233852' ,'2007/09/01',  '5000' , 3 ,  368254 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 14,3,1, 'yy524640' , 'ratti' ,  'dafid' , '1971/03/11' ,  '22 rue hhhh' ,'054545455577' , '2014/09/09',  '6000' , 3 ,  35242224 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  (15,5,1, 'wt774622' , 'fassi' ,  'galma' , '1988/09/01' ,  '22 rue fss' ,'055444555' ,'2009/09/01',  '9000' , 2 ,  74414144 , 'H')
--devloppeur mobile

INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 16,1,2, 'rr744544' , 'rajawo' ,  'monit' , '1990/04/03' ,  '22 rue jajj' ,'0574147425' , '2010/09/01',  '5000' , 3 ,  8745555 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 17,3,2, 'ff412362' , 'nom' ,  'prenom' , '1966/08/03' ,  '14 rue iiiiii' ,'0574124152' , GETDATE() ,  '5000' , 3 ,  455455 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 18,5,2, 'nn774125' , 'widadii' ,  'mehemde' , '1981/03/11' ,  '22 rue jajj' ,'0574665255' , GETDATE() ,  '6000' , 3 ,  56675666 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 19,2,2, 'll74525' , 'galilio' ,  'dicart' , '1985/03/11' ,  '22 rue koppo' ,'057414565' , GETDATE() ,  '6000' , 3 ,  557545455 , 'H') 

INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 20,2,2, 'gt52465' , 'khrigib' ,  'ahmed' , '1964/09/01' ,  '22 rue frfr' ,'05415425254' ,'2016/09/01',  '5000' , 3 ,  123541 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 21,2,2, 'fr415236' , 'victor' ,  'hugo' , '1983/02/03' ,  '14 rue root' ,'0574145236' ,'2011/04/01',  '5000' , 3 ,  857221 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  (22,2,2, 'rt541236' , 'merakechi' ,  'jalil' , '1989/11/11' ,  '45 rue ggggg' ,'054124255' , '2012/09/09',  '6000' , 3 ,  545254525 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  (23,2,2, 'uu541635' , 'maknassi' ,  'abd kaar' , '1961/03/12' ,  '88 rue chocho' ,'054152544' ,'2015/09/01' ,  '6000' , 3 ,  85522544 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  (24,2,2, 'zz541236' , 'frid' ,  'monir' , '1979/09/01' ,  '22 rue chihaja' ,'0541243335' ,'2008/09/01',  '5000' , 3 ,  856555 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  (25,3,2, 'rs741526' , 'nom test' ,  'prenom test' , '1977/4/02' ,  '14 rue lololl' ,'0541236241' ,'2018/09/01',  '5000' , 3 ,  774155 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 26,5,2, 'ht555745' , 'rbati' ,  'mohemde' , '1971/03/11' ,  '22 rue lol' ,'05225412785' , '2015/09/09',  '6000' , 3 ,  7455541 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  (27,5,2, 'fg415236' , 'fassi' ,  'hamza' , '1976/09/01' ,  '22 rue tyoio' ,'0541266545' ,'2010/09/01',  '4000' , 3 ,  445555 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 28,5,2, 'hu741536' , 'jojo' ,  'prenom' , '1988/01/01' ,  '14 rue goufoi' ,'0554412554' ,'2018/09/01',  '5000' , 3 ,  5845542 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 29,4,2, 'rg541321' , 'dodo' ,  'dalil' , '1974/03/11' ,  '22 rue ttooo' ,'0544565555' , '2013/09/09',  '6000' , 3 ,  7756666 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  (30,4,2, 'rs415632' , 'didivd' ,  'galma' , '1988/09/01' ,  '22 rue fss' ,'055444555' ,'2009/09/01',  '9000' , 2 ,  587555 , 'H')
------------web marketing
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 31,1,3, 'ii87452' , 'reglado' ,  'mohemde' , '1980/04/03' ,  '22 rue goolo' ,'057415326' , '2011/09/01',  '7000' , 3 ,  74422 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 32,3,3, 'fg741536' , 'nom' ,  'prenom' , '1966/08/06' ,  '14 rue uuuuu' ,'054152639' , '2003/09/01' ,  '5000' , 3 ,  55422 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 33,5,3, 'dd7555' , 'widadii' ,  'mehemde' , '1981/03/11' ,  '22 rue jajj' ,'0574665255' , '2011/09/01' ,  '6000' , 3 ,  74523 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 34,4,3, 'tg44555' , 'galilio' ,  'dicart' , '1985/03/11' ,  '22 rue koppo' ,'057414565' , '2011/09/01' ,  '6000' , 3 ,  5533 , 'H') 
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 35,5,3, 'tg44155' , 'widadii' ,  'mehemde' , '1981/03/11' ,  '22 rue jajj' ,'0574665255' , '2011/09/01' ,  '6000' , 3 ,  1523 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 36,4,3, 'ff741582' , 'galilio' ,  'dicart' , '1985/03/11' ,  '22 rue koppo' ,'057414565' , GETDATE() ,  '6000' , 3 ,  74569 , 'H') 

------------------service fiancier
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 37,1,3, 'tg553225' , 'reglado' ,  'mohemde' , '1980/04/03' ,  '22 rue goolo' ,'057415326' , '2011/09/01',  '7000' , 3 ,  74422 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 38,3,3, 'fy524236' , 'nom' ,  'prenom' , '1966/08/06' ,  '14 rue uuuuu' ,'054152639' , '2003/09/01' ,  '5000' , 3 ,  55422 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 39,5,3, 'rr741953' , 'nom 1' ,  'presnom1' , '1981/03/11' ,  '22 rue jajj' ,'0574665255' , '2011/09/01' ,  '6000' , 3 ,  74523 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 40,4,3, 'aa525536' , 'nom 2' ,  'prenom 2' , '1985/03/11' ,  '22 rue koppo' ,'057414565' , '2011/09/01' ,  '6000' , 3 ,  5533 , 'H') 
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 41,5,3, 'df525636' , 'nom 3' ,  'prenom 3' , '1981/03/11' ,  '22 rue jajj' ,'0574665255' , '2011/09/01' ,  '6000' , 3 ,  1523 , 'H')
INSERT dbo.EMPLOYER( IDEMPLOYER ,IDVILLE ,IDEQUIPE ,CIN ,NOM ,PRENOM ,DATENAISSANCE ,ADRESSE ,FIX ,DATEEMBAUCHE ,SALAIREDENTER ,GRADE ,NUMCOMPTE ,GENDER)
VALUES  ( 42,4,3, 'qw845963' , 'nom 4' ,  'prenom 4' , '1985/03/11' ,  '22 rue koppo' ,'057414565' , GETDATE() ,  '6000' , 3 ,  74569 , 'H') 


/*==============================================================*/
/* insertion  pays                                 */
/*==============================================================*/
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 1, 1 , 'societe x' , '874 rue madiriss' , '054152652' ,'054152652' , '068454587' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 2, 5 , 'societe y' , '214 rue farara' , '0644665465' ,'0644665465' , '0644665465' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 3, 3 , 'societe azx' , '52 rue takafa' , '065226652' ,'055665545' , '068441345' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 4, 4 , 'societe rrt' , '874 boulvard adarissa' , '054152652' ,'054152652' , '068454547' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 5, 5 , 'societe frrt' , '895 rue chefchawni' , '054152652' ,'054152652' , '0684557745' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 6, 4 , 'societe tfg' , '12 rue ahmed' , '05746698522' ,'05746698522' , '06522666' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 7, 2 , 'societe fggg' , '200 rue madiriss' , '054153662' ,'054153662' , '065224422' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 8, 1 , 'societe tyy' , '65	 rue madiriss' , '054152652' ,'054152652' , '068454587' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 9, 5 , 'societe aaas' , '23 rue farara' , '0644665465' ,'0644665465' , '0644665465' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES ( 10, 3 , 'societe ttx' , '19 rue takafa' , '065226652' ,'055665545' , '068441345' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES (11, 4 , 'societe ffao' , '12 boulvard adarissa' , '054152652' ,'054152652' , '068454547' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES (12, 5 , 'societe ggtpo' , '200 rue chefchawni' , '054152652' ,'054152652' , '0684557745' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES (13, 4 , 'societe tffd' , '16 rue ahmed' , '05746698522' ,'05746698522' , '06522666' )
INSERT INTO dbo.CLIENT( IDCLIENT ,IDVILLE ,NOM ,ADRESSE ,FIX ,FAX ,TEL) VALUES (14, 2 , 'societe fffop' , '14 rue madiriss' , '054153662' ,'054153662' , '065224422' )

/*==============================================================*/
/* insertion  events                                 */
/*==============================================================*/
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 1 ,2 , 1 , '2012/03/09' ,'2012/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 2 ,1 , 1 , '2011/03/09' ,'2011/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 3 ,5 , 1 , '2010/03/09' ,'2010/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 4 ,4 , 1 , '2016/03/09' ,'2016/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 5 ,5 , 1 , '2006/03/09' ,'2006/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 6 ,5 , 1 , '2003/03/09' ,'2003/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 7 ,4 , 1 , '2009/03/09' ,'2009/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 8 ,3 , 1 , '2014/03/09' ,'2014/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 9 ,2 , 1 , '2015/03/09' ,'2015/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 10 ,3 , 1 , '2012/06/06' ,'2012/06/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 11 ,3 , 1 , '2016/11/11' ,'2016/12/12' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 12,3, 1 , '2004/03/09' ,'2004/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 13 ,4 , 1 , '2001/03/09' ,'2001/03/11' , GETDATE() )
INSERT INTO dbo.EVENT( IDEVENT ,IDVILLE ,IDEMPLOYER ,DATEDEBUT ,DESCRIPTION ,DATEFIN) VALUES  ( 14 ,3 , 1 , '2002/03/09' ,'2002/03/11' , GETDATE() )
/*==============================================================*/
/* insertion  MATERIEL                                 */
/*==============================================================*/
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 1, 'TV HD')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 2, 'PROJECTEUR')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  (3, 'POSTE ')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 4, 'DESCRIPTION  MATERIEL 1')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  (5, 'DESCRIPTION  MATERIEL 2')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 6, 'DESCRIPTION  MATERIEL 3')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 7, 'DESCRIPTION  MATERIEL 4')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 8, 'DESCRIPTION  MATERIEL 5')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 9, 'DESCRIPTION  MATERIEL 6')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 10, 'DESCRIPTION  MATERIEL 7')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 11, 'DESCRIPTION  MATERIEL 8')
INSERT INTO dbo.MATERIEL( IDMATERIEL, DESCRIPTION ) VALUES  ( 12, 'DESCRIPTION  MATERIEL 9')
/*==============================================================*/
/* insertion  CONGE                                 */
/*==============================================================*/
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 1  , 1, '2012/08/08' ,'CONGE DE MALADIE' ,  '2012/08/09',  '2012/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 2  , 2, '2013/07/08' ,'CONGE DE MALADIE' ,  '2013/08/09',  '2013/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 3  , 5, '2011/08/08' ,'CONGE DE MALADIE' ,  '2011/08/09',  '2011/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 4  , 4, '2006/08/08' ,'CONGE DE MALADIE' ,  '2006/08/09',  '2006/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 5  , 12, '2016/08/08' ,'CONGE DE MALADIE' ,  '2016/08/09',  '2016/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 6  , 10, '2017/08/08' ,'CONGE DE MALADIE' ,  '2017/08/09',  '2017/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 8  , 6, '2011/08/08' ,'CONGE DE MALADIE' ,  '2012/08/09',  '2011/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 9  , 6, '2013/08/08' ,'CONGE DE MALADIE' ,  '2012/08/09',  '2013/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 10  , 6, '2013/08/08' ,'CONGE DE MALADIE' ,  '2013/08/09',  '2013/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 11  , 5, '2012/06/06' ,'CONGE DE MALADIE' ,  '2012/08/09',  '2012/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 12  , 2, '2012/08/08' ,'CONGE DE MALADIE' ,  '2012/08/09',  '2012/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 13  , 11, '2003/08/08' ,'CONGE DE MALADIE' ,  '2003/08/09',  '2003/08/12')
INSERT INTO dbo.CONGE( IDCONGE ,IDEMPLOYER ,DATEASK ,LABELE ,DATEDEBUT ,DATEFIN) VALUES  ( 14  , 25, '2017/08/08' ,'CONGE DE L''ANNE' ,  '2017/08/09',  '2017/08/12')
/*==============================================================*/
/* insertion  REMUNERATION                                 */
/*==============================================================*/
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (1 , 1 ,40 ,'BLBLBLLBLBB', 500, 5000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (2 , 6 ,40 ,'BLBLBLLBLBB', 500, 7000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (3 , 25 ,40 ,'BLBLBLLBLBB', 500, 6000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (4 , 27 ,40 ,'BLBLBLLBLBB', 500, 6500)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (5 , 30 ,40 ,'BLBLBLLBLBB', 500, 5000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (6 , 12 ,40 ,'BLBLBLLBLBB', 500, 5000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (7 , 12 ,40 ,'BLBLBLLBLBB', 500, 5000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (8 , 12,40 ,'BLBLBLLBLBB', 500, 4000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (9 , 12 ,40 ,'BLBLBLLBLBB', 500, 6000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (10 , 2 ,40 ,'BLBLBLLBLBB', 500, 9000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (11, 2 ,40 ,'BLBLBLLBLBB', 500, 9000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (12 , 5 ,40 ,'BLBLBLLBLBB', 500, 5000)
INSERT INTO dbo.REMUNERATION( IDREMUNERATION ,IDEMPLOYER ,NBRWORKHOUR ,DESCRIPTION ,PRIME ,SALAIRE) VALUES  (13 , 3 ,40 ,'BLBLBLLBLBB', 500, 4000)
/*==============================================================*/
/* insertion  proejt                                 */
/*==============================================================*/

INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 1 ,15 , '2018/01/01' , '2018/08/03' ,'description projets','projet web')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  (2 ,15 , '2018/01/01' , '2018/06/03' ,'description projets bllbb','projet web')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 3 ,15 , '2017/01/01' , '2017/08/03' ,'description projets dsfsdfsd','projet web')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 4 ,15 , '2016/01/01' , '2016/08/03' ,'description projets sdfsdfds','projet web')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 5 ,15 , '2015/01/01' , '2015/08/03' ,'description projets dcdscdscds','projet web')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 6 ,15 , '2010/01/01' , '2010/08/03' ,'description projets','projet web')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 7 ,15 , '2014/01/01' , '2014/08/03' ,'description projets','projet web')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 8 ,15 , '2011/01/01' , '2011/08/03' ,'description projets','projet web')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 9 ,15 , '2012/01/01' , '2012/08/03' ,'description projets','projet web')
------
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 10 ,15 , '2005/01/01' , '2005/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 11 ,15 , '2003/01/01' , '2003/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 12 ,15 , '2004/01/01' , '2004/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 121 ,15 , '2002/01/01' , '2002/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 14 ,15 , '2001/01/01' , '2001/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 15 ,15 , '2006/01/01' , '2006/08/03' ,'description projets blalaballa ','projet mobile')
 INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 16 ,15 , '2008/01/01' , '2008/08/03' ,'description projet blalaballa s','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 17 ,15 , '2009/01/01' , '2009/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 18 ,15 , '2000/01/01' , '2000/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 19 ,15 , '2021/01/01' , '2021/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 20 ,15 , '2018/02/02' , '2018/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 21 ,15 , '2018/06/01' , '2018/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 22 ,15 , '2018/06/01' , '2018/08/03' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 23 ,15 , '2018/01/10' , '2018/08/10' ,'description projets blalaballa ','projet mobile')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 24 ,15 , '2020/01/01' , '2020/08/03' ,'description projets blalaballa ','projet mobile')
---------------
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 25 ,15 , '2018/01/01' , '2018/08/03' ,'description projets','web marketing')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 26 ,15 , '2018/01/01' , '2018/08/03' ,'description projets','web marketing')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 27 ,15 , '2018/01/01' , '2018/08/03' ,'description projets','web marketing')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 28,15 , '2018/01/01' , '2018/08/03' ,'description projets','web marketing')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  (29 ,15 , '2018/01/01' , '2018/08/03' ,'description projets','web marketing')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 30 ,15 , '2018/01/01' , '2018/08/03' ,'description projets','web marketing')
INSERT INTO dbo.PROJET( IDPROJETS ,IDEMPLOYER ,DATEDEBUT ,DATEFIN ,DESCRIPTION ,TYPE) VALUES  ( 31 ,15 , '2018/01/01' , '2018/08/03' ,'description projets','web marketing')
/*==============================================================*/
/* insertion  tache                                 */
/*==============================================================*/
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 1, 1, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 2, 1, 1 , 'DESCRIPTION blalalalaa', '2018/04/03' ,'2018/04/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 3, 3, 1 , 'DESCRIPTION blalalalaa', '2018/05/03' ,'2018/05/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 4, 5, 1 , 'DESCRIPTION blalalalaa', '2018/06/03' ,'2018/06/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 5, 4, 1 , 'DESCRIPTION blalalalaa', '2018/8/03' ,'2018/09/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 6, 3, 1 , 'DESCRIPTION blalalalaa', '2018/010/03' ,'2018/11/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 7, 1, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 8, 5, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 9, 2, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 10, 2, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 11, 2, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 12, 3, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 13, 3, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 14, 3, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 15, 3, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 16, 3, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 17, 3, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 18, 3, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 19, 3, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')
INSERT INTO dbo.TACHE( IDTACHE ,IDEMPLOYER ,IDPROJETS ,DESCRIPTION ,DATEDEBUT ,DATEFIN) VALUES  ( 120, 3, 1 , 'DESCRIPTION blalalalaa', '2018/03/03' ,'2018/03/04')

/*==============================================================*/
/* insertion  facture                                 */
/*==============================================================*/

INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (1 , 1 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2011/01/01')

INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (2 , 2 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2011/02/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES ( 3, 3 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2011/03/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (4 , 4 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2011/04/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (5 , 2 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2017/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (6 , 2 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2013/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (7 , 2 , 1,10000 , 2 , 'DESCRIPTION blablalbla ' ,'2014/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (8 , 5 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2015/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (9 , 5 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2016/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (10 , 5 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2018/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (11, 6, 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2007/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (12 , 7 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2008/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (13 , 3 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2009/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (14 , 3 , 1,10000 , 3 , 'DESCRIPTION blablalbla ' ,'2014/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (15 , 4 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2013/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (16 , 4 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2014/09/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (17 , 2 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2010/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (18 , 1 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2008/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (19 , 1 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2005/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (20 , 3 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2006/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (21 , 4 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2003/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (22 , 4 , 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2004/01/01')
INSERT INTO dbo.FACTURE( IDFACTURE ,IDPROJETS ,IDCLIENT ,MONTANTHT ,TVA ,DESCRIPTION ,DATE) VALUES (23, 4, 1,10000 , 5 , 'DESCRIPTION blablalbla ' ,'2016/01/01')

/*==============================================================*/
/* insertion  utiliser                                 */
/*==============================================================*/
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 1, 1,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 2, 1,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 3, 2,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 4, 3,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 5, 4,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 6, 3,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 7, 3,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 8, 3,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 9, 5,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 10, 5,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 11, 5,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 12, 5,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 13, 2,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 14, 2,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 15, 2,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 16, 3,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 17, 3,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 18, 2,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 19, 1,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 20, 1,'DESCRIPTION blabla blbballaa ')
INSERT INTO dbo.UTILISE( IDEVENT, IDMATERIEL, DESCRIPTION ) VALUES  ( 21, 1,'DESCRIPTION blabla blbballaa ')