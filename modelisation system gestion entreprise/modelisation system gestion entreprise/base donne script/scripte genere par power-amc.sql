/*==============================================================*/
/* Nom de SGBD :  Microsoft SQL Server 2008                     */
/* Date de création :  3/10/2018 4:13:34 PM                     */
/*==============================================================*/


if exists (select 1
          from sysobjects
          where id = object_id('CLR_TRIGGER_FACTURE')
          and type = 'TR')
   drop trigger CLR_TRIGGER_FACTURE
go

if exists (select 1
          from sysobjects
          where id = object_id('TI_FACTURE')
          and type = 'TR')
   drop trigger TI_FACTURE
go

if exists (select 1
          from sysobjects
          where id = object_id('TU_FACTURE')
          and type = 'TR')
   drop trigger TU_FACTURE
go

if exists (select 1
          from sysobjects
          where id = object_id('CLR_TRIGGER_PROJET')
          and type = 'TR')
   drop trigger CLR_TRIGGER_PROJET
go

if exists (select 1
          from sysobjects
          where id = object_id('TD_PROJET')
          and type = 'TR')
   drop trigger TD_PROJET
go

if exists (select 1
          from sysobjects
          where id = object_id('TI_PROJET')
          and type = 'TR')
   drop trigger TI_PROJET
go

if exists (select 1
          from sysobjects
          where id = object_id('TU_PROJET')
          and type = 'TR')
   drop trigger TU_PROJET
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('CLIENT')
            and   name  = 'SITUER_FK'
            and   indid > 0
            and   indid < 255)
   drop index CLIENT.SITUER_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('CLIENT')
            and   type = 'U')
   drop table CLIENT
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('CONGE')
            and   name  = 'DEMANDE_FK'
            and   indid > 0
            and   indid < 255)
   drop index CONGE.DEMANDE_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('CONGE')
            and   type = 'U')
   drop table CONGE
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('EMPLOYER')
            and   name  = 'RELATION_7_FK'
            and   indid > 0
            and   indid < 255)
   drop index EMPLOYER.RELATION_7_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('EMPLOYER')
            and   name  = 'HABITE_FK'
            and   indid > 0
            and   indid < 255)
   drop index EMPLOYER.HABITE_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('EMPLOYER')
            and   type = 'U')
   drop table EMPLOYER
go

if exists (select 1
            from  sysobjects
           where  id = object_id('EQUIPE')
            and   type = 'U')
   drop table EQUIPE
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('EVENT')
            and   name  = 'LOCALISATION_FK'
            and   indid > 0
            and   indid < 255)
   drop index EVENT.LOCALISATION_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('EVENT')
            and   name  = 'ORGANISE_FK'
            and   indid > 0
            and   indid < 255)
   drop index EVENT.ORGANISE_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('EVENT')
            and   type = 'U')
   drop table EVENT
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('FACTURE')
            and   name  = 'FACTUER2_FK'
            and   indid > 0
            and   indid < 255)
   drop index FACTURE.FACTUER2_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('FACTURE')
            and   name  = 'CORESPONDANT_FK'
            and   indid > 0
            and   indid < 255)
   drop index FACTURE.CORESPONDANT_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('FACTURE')
            and   type = 'U')
   drop table FACTURE
go

if exists (select 1
            from  sysobjects
           where  id = object_id('MATERIEL')
            and   type = 'U')
   drop table MATERIEL
go

if exists (select 1
            from  sysobjects
           where  id = object_id('PAYS')
            and   type = 'U')
   drop table PAYS
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('PROJET')
            and   name  = 'RESPONSABLE_FK'
            and   indid > 0
            and   indid < 255)
   drop index PROJET.RESPONSABLE_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('PROJET')
            and   type = 'U')
   drop table PROJET
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('REMUNERATION')
            and   name  = 'AVOIR_FK'
            and   indid > 0
            and   indid < 255)
   drop index REMUNERATION.AVOIR_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('REMUNERATION')
            and   type = 'U')
   drop table REMUNERATION
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('TACHE')
            and   name  = 'FAIT_FK'
            and   indid > 0
            and   indid < 255)
   drop index TACHE.FAIT_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('TACHE')
            and   name  = 'COMPOSE_FK'
            and   indid > 0
            and   indid < 255)
   drop index TACHE.COMPOSE_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('TACHE')
            and   type = 'U')
   drop table TACHE
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('UTILISE')
            and   name  = 'UTILISE2_FK'
            and   indid > 0
            and   indid < 255)
   drop index UTILISE.UTILISE2_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('UTILISE')
            and   name  = 'UTILISE_FK'
            and   indid > 0
            and   indid < 255)
   drop index UTILISE.UTILISE_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('UTILISE')
            and   type = 'U')
   drop table UTILISE
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('VILLE')
            and   name  = 'APPPARTIENT_FK'
            and   indid > 0
            and   indid < 255)
   drop index VILLE.APPPARTIENT_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('VILLE')
            and   type = 'U')
   drop table VILLE
go

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
   SALAIREDENTER        money                null,
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


create trigger CLR_TRIGGER_FACTURE on FACTURE  insert as
external name %Assembly.GeneratedName%.
go


create trigger TI_FACTURE on FACTURE for insert as
begin
    declare
       @maxcard  int,
       @numrows  int,
       @numnull  int,
       @errno    int,
       @errmsg   varchar(255)

    select  @numrows = @@rowcount
    if @numrows = 0
       return

    /*  Le parent "CLIENT" doit exister à la création d'un enfant dans "FACTURE"  */
    if update(IDCLIENT)
    begin
       if (select count(*)
           from   CLIENT t1, inserted t2
           where  t1.IDCLIENT = t2.IDCLIENT) != @numrows
          begin
             select @errno  = 50002,
                    @errmsg = 'Le parent n''''existe pas dans "CLIENT". Impossible de créer un enfant dans "FACTURE".'
             goto error
          end
    end
    /*  Le parent "PROJET" doit exister à la création d'un enfant dans "FACTURE"  */
    if update(IDPROJETS)
    begin
       select @numnull = (select count(*)
                          from   inserted
                          where  IDPROJETS is null)
       if @numnull != @numrows
          if (select count(*)
              from   PROJET t1, inserted t2
              where  t1.IDPROJETS = t2.IDPROJETS) != @numrows - @numnull
          begin
             select @errno  = 50002,
                    @errmsg = 'Le parent n''''existe pas dans "PROJET". Impossible de créer un enfant dans "FACTURE".'
             goto error
          end
    end
    /*  La cardinalité du parent "PROJET" dans l'enfant "FACTURE" est limitée à 1 */
    if update(IDPROJETS)
    begin
       select @maxcard = (select count(*)
          from   FACTURE old
          where ins.IDPROJETS = old.IDPROJETS)
       from  inserted ins
       where ins.IDPROJETS is not null
       group by ins.IDPROJETS
       order by 1
       if @maxcard > 1
       begin
          select @errno  = 50007,
                 @errmsg = 'Nombre maximum d''''occurrences dépassé. Impossible de créer un enfant dans "FACTURE".'
          goto error
       end
    end

    return

/*  Traitement d'erreurs  */
error:
    raiserror @errno @errmsg
    rollback  transaction
end
go


create trigger TU_FACTURE on FACTURE for update as
begin
   declare
      @maxcard  int,
      @numrows  int,
      @numnull  int,
      @errno    int,
      @errmsg   varchar(255)

      select  @numrows = @@rowcount
      if @numrows = 0
         return

      /*  Le parent "CLIENT" doit exister à la mise à jour d'un enfant dans "FACTURE"  */
      if update(IDCLIENT)
      begin
         if (select count(*)
             from   CLIENT t1, inserted t2
             where  t1.IDCLIENT = t2.IDCLIENT) != @numrows
            begin
               select @errno  = 50003,
                      @errmsg = 'CLIENT" n''''existe pas. Impossible de modifier l''''enfant dans "FACTURE".'
               goto error
            end
      end
      /*  Le parent "PROJET" doit exister à la mise à jour d'un enfant dans "FACTURE"  */
      if update(IDPROJETS)
      begin
         select @numnull = (select count(*)
                            from   inserted
                            where  IDPROJETS is null)
         if @numnull != @numrows
            if (select count(*)
                from   PROJET t1, inserted t2
                where  t1.IDPROJETS = t2.IDPROJETS) != @numrows - @numnull
            begin
               select @errno  = 50003,
                      @errmsg = 'PROJET" n''''existe pas. Impossible de modifier l''''enfant dans "FACTURE".'
               goto error
            end
      end
      /*  La cardinalité du parent "PROJET" dans l'enfant "FACTURE" est limitée à 1 */
      if update(IDPROJETS)
      begin
         select @maxcard = (select count(*)
            from   FACTURE old
            where ins.IDPROJETS = old.IDPROJETS)
         from  inserted ins
         where ins.IDPROJETS is not null
         group by ins.IDPROJETS
         order by 1
         if @maxcard > 1
         begin
            select @errno  = 50007,
                   @errmsg = 'Nombre maximum d''''occurrences dépassé. Impossible de modifier un enfant dans "FACTURE".'
            goto error
         end
      end

      return

/*  Traitement d'erreurs  */
error:
    raiserror @errno @errmsg
    rollback  transaction
end
go


create trigger CLR_TRIGGER_PROJET on PROJET  insert as
external name %Assembly.GeneratedName%.
go


create trigger TD_PROJET on PROJET for delete as
begin
    declare
       @numrows  int,
       @errno    int,
       @errmsg   varchar(255)

    select  @numrows = @@rowcount
    if @numrows = 0
       return

    /*  Impossible de supprimer le parent "PROJET" avec des enfants dans "TACHE"  */
    if exists (select 1
               from   TACHE t2, deleted t1
               where  t2.IDPROJETS = t1.IDPROJETS)
       begin
          select @errno  = 50006,
                 @errmsg = 'Il existe encore des enfants dans "TACHE". Impossible de supprimer le parent "PROJET".'
          goto error
       end

    /*  Impossible de supprimer le parent "PROJET" avec des enfants dans "FACTURE"  */
    if exists (select 1
               from   FACTURE t2, deleted t1
               where  t2.IDPROJETS = t1.IDPROJETS)
       begin
          select @errno  = 50006,
                 @errmsg = 'Il existe encore des enfants dans "FACTURE". Impossible de supprimer le parent "PROJET".'
          goto error
       end


    return

/*  Traitement d'erreurs  */
error:
    raiserror @errno @errmsg
    rollback  transaction
end
go


create trigger TI_PROJET on PROJET for insert as
begin
    declare
       @numrows  int,
       @numnull  int,
       @errno    int,
       @errmsg   varchar(255)

    select  @numrows = @@rowcount
    if @numrows = 0
       return

    /*  Le parent "EMPLOYER" doit exister à la création d'un enfant dans "PROJET"  */
    if update(IDEMPLOYER)
    begin
       if (select count(*)
           from   EMPLOYER t1, inserted t2
           where  t1.IDEMPLOYER = t2.IDEMPLOYER) != @numrows
          begin
             select @errno  = 50002,
                    @errmsg = 'Le parent n''''existe pas dans "EMPLOYER". Impossible de créer un enfant dans "PROJET".'
             goto error
          end
    end

    return

/*  Traitement d'erreurs  */
error:
    raiserror @errno @errmsg
    rollback  transaction
end
go


create trigger TU_PROJET on PROJET for update as
begin
   declare
      @numrows  int,
      @numnull  int,
      @errno    int,
      @errmsg   varchar(255)

      select  @numrows = @@rowcount
      if @numrows = 0
         return

      /*  Le parent "EMPLOYER" doit exister à la mise à jour d'un enfant dans "PROJET"  */
      if update(IDEMPLOYER)
      begin
         if (select count(*)
             from   EMPLOYER t1, inserted t2
             where  t1.IDEMPLOYER = t2.IDEMPLOYER) != @numrows
            begin
               select @errno  = 50003,
                      @errmsg = 'EMPLOYER" n''''existe pas. Impossible de modifier l''''enfant dans "PROJET".'
               goto error
            end
      end
      /*  Impossible de modifier le code du parent "PROJET" avec des enfants dans "TACHE"  */
      if update(IDPROJETS)
      begin
         if exists (select 1
                    from   TACHE t2, inserted i1, deleted d1
                    where  t2.IDPROJETS = d1.IDPROJETS
                     and  (i1.IDPROJETS != d1.IDPROJETS))
            begin
               select @errno  = 50005,
                      @errmsg = 'Il existe encore des enfants dans "TACHE". Impossible de modifier le code du parent "PROJET".'
               goto error
            end
      end

      /*  Impossible de modifier le code du parent "PROJET" avec des enfants dans "FACTURE"  */
      if update(IDPROJETS)
      begin
         if exists (select 1
                    from   FACTURE t2, inserted i1, deleted d1
                    where  t2.IDPROJETS = d1.IDPROJETS
                     and  (i1.IDPROJETS != d1.IDPROJETS))
            begin
               select @errno  = 50005,
                      @errmsg = 'Il existe encore des enfants dans "FACTURE". Impossible de modifier le code du parent "PROJET".'
               goto error
            end
      end


      return

/*  Traitement d'erreurs  */
error:
    raiserror @errno @errmsg
    rollback  transaction
end
go

