namespace WindowsFormsApp3
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>dataGridView1
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            this.btn_add_commande = new System.Windows.Forms.Button();
            this.btn_import_xml = new System.Windows.Forms.Button();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.codeclientDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.refproduitDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.ncommandeDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.destinataireDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.adresselivraisonDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.villeLivraisonDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.regionlivraisonDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.codepostallivraisonDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.payslivraisonDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.societeDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.nEmployéDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.vendeurDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.datecommandeDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.alivreravantDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.dateenvoiDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.nomdumessagerDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.nomduproduitDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.prixunitaireDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.quantiteDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.remiseDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.prixTotalDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.portDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.listeCommandeBindingSource = new System.Windows.Forms.BindingSource(this.components);
            this.gestion_comptoirDataSet = new Gestion_comptoir.gestion_comptoirDataSet();
            this.listeCommandeTableAdapter = new Gestion_comptoir.gestion_comptoirDataSetTableAdapters.listeCommandeTableAdapter();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.listeCommandeBindingSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet)).BeginInit();
            this.SuspendLayout();
            // 
            // btn_add_commande
            // 
            this.btn_add_commande.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.btn_add_commande.Location = new System.Drawing.Point(27, 372);
            this.btn_add_commande.Name = "btn_add_commande";
            this.btn_add_commande.Size = new System.Drawing.Size(75, 23);
            this.btn_add_commande.TabIndex = 1;
            this.btn_add_commande.Text = "Ajoute";
            this.btn_add_commande.UseVisualStyleBackColor = true;
            this.btn_add_commande.Click += new System.EventHandler(this.btn_add_commande_Click);
            // 
            // btn_import_xml
            // 
            this.btn_import_xml.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_import_xml.Location = new System.Drawing.Point(544, 372);
            this.btn_import_xml.Name = "btn_import_xml";
            this.btn_import_xml.Size = new System.Drawing.Size(120, 23);
            this.btn_import_xml.TabIndex = 3;
            this.btn_import_xml.Text = "Importer XML";
            this.btn_import_xml.UseVisualStyleBackColor = true;
            this.btn_import_xml.Click += new System.EventHandler(this.btn_import_xml_Click);
            // 
            // dataGridView1
            // 
            this.dataGridView1.AllowUserToAddRows = false;
            this.dataGridView1.AllowUserToDeleteRows = false;
            this.dataGridView1.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.dataGridView1.AutoGenerateColumns = false;
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.codeclientDataGridViewTextBoxColumn,
            this.refproduitDataGridViewTextBoxColumn,
            this.ncommandeDataGridViewTextBoxColumn,
            this.destinataireDataGridViewTextBoxColumn,
            this.adresselivraisonDataGridViewTextBoxColumn,
            this.villeLivraisonDataGridViewTextBoxColumn,
            this.regionlivraisonDataGridViewTextBoxColumn,
            this.codepostallivraisonDataGridViewTextBoxColumn,
            this.payslivraisonDataGridViewTextBoxColumn,
            this.societeDataGridViewTextBoxColumn,
            this.nEmployéDataGridViewTextBoxColumn,
            this.vendeurDataGridViewTextBoxColumn,
            this.datecommandeDataGridViewTextBoxColumn,
            this.alivreravantDataGridViewTextBoxColumn,
            this.dateenvoiDataGridViewTextBoxColumn,
            this.nomdumessagerDataGridViewTextBoxColumn,
            this.nomduproduitDataGridViewTextBoxColumn,
            this.prixunitaireDataGridViewTextBoxColumn,
            this.quantiteDataGridViewTextBoxColumn,
            this.remiseDataGridViewTextBoxColumn,
            this.prixTotalDataGridViewTextBoxColumn,
            this.portDataGridViewTextBoxColumn});
            this.dataGridView1.DataSource = this.listeCommandeBindingSource;
            this.dataGridView1.Location = new System.Drawing.Point(2, 29);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.ReadOnly = true;
            this.dataGridView1.Size = new System.Drawing.Size(692, 326);
            this.dataGridView1.TabIndex = 4;
            // 
            // codeclientDataGridViewTextBoxColumn
            // 
            this.codeclientDataGridViewTextBoxColumn.DataPropertyName = "Code_client";
            this.codeclientDataGridViewTextBoxColumn.HeaderText = "Code_client";
            this.codeclientDataGridViewTextBoxColumn.Name = "codeclientDataGridViewTextBoxColumn";
            this.codeclientDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // refproduitDataGridViewTextBoxColumn
            // 
            this.refproduitDataGridViewTextBoxColumn.DataPropertyName = "Ref_produit";
            this.refproduitDataGridViewTextBoxColumn.HeaderText = "Ref_produit";
            this.refproduitDataGridViewTextBoxColumn.Name = "refproduitDataGridViewTextBoxColumn";
            this.refproduitDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // ncommandeDataGridViewTextBoxColumn
            // 
            this.ncommandeDataGridViewTextBoxColumn.DataPropertyName = "N_commande";
            this.ncommandeDataGridViewTextBoxColumn.HeaderText = "N_commande";
            this.ncommandeDataGridViewTextBoxColumn.Name = "ncommandeDataGridViewTextBoxColumn";
            this.ncommandeDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // destinataireDataGridViewTextBoxColumn
            // 
            this.destinataireDataGridViewTextBoxColumn.DataPropertyName = "Destinataire";
            this.destinataireDataGridViewTextBoxColumn.HeaderText = "Destinataire";
            this.destinataireDataGridViewTextBoxColumn.Name = "destinataireDataGridViewTextBoxColumn";
            this.destinataireDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // adresselivraisonDataGridViewTextBoxColumn
            // 
            this.adresselivraisonDataGridViewTextBoxColumn.DataPropertyName = "Adresse_livraison";
            this.adresselivraisonDataGridViewTextBoxColumn.HeaderText = "Adresse_livraison";
            this.adresselivraisonDataGridViewTextBoxColumn.Name = "adresselivraisonDataGridViewTextBoxColumn";
            this.adresselivraisonDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // villeLivraisonDataGridViewTextBoxColumn
            // 
            this.villeLivraisonDataGridViewTextBoxColumn.DataPropertyName = "Ville livraison";
            this.villeLivraisonDataGridViewTextBoxColumn.HeaderText = "Ville livraison";
            this.villeLivraisonDataGridViewTextBoxColumn.Name = "villeLivraisonDataGridViewTextBoxColumn";
            this.villeLivraisonDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // regionlivraisonDataGridViewTextBoxColumn
            // 
            this.regionlivraisonDataGridViewTextBoxColumn.DataPropertyName = "Region_livraison";
            this.regionlivraisonDataGridViewTextBoxColumn.HeaderText = "Region_livraison";
            this.regionlivraisonDataGridViewTextBoxColumn.Name = "regionlivraisonDataGridViewTextBoxColumn";
            this.regionlivraisonDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // codepostallivraisonDataGridViewTextBoxColumn
            // 
            this.codepostallivraisonDataGridViewTextBoxColumn.DataPropertyName = "Code_postal_livraison";
            this.codepostallivraisonDataGridViewTextBoxColumn.HeaderText = "Code_postal_livraison";
            this.codepostallivraisonDataGridViewTextBoxColumn.Name = "codepostallivraisonDataGridViewTextBoxColumn";
            this.codepostallivraisonDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // payslivraisonDataGridViewTextBoxColumn
            // 
            this.payslivraisonDataGridViewTextBoxColumn.DataPropertyName = "Pays_livraison";
            this.payslivraisonDataGridViewTextBoxColumn.HeaderText = "Pays_livraison";
            this.payslivraisonDataGridViewTextBoxColumn.Name = "payslivraisonDataGridViewTextBoxColumn";
            this.payslivraisonDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // societeDataGridViewTextBoxColumn
            // 
            this.societeDataGridViewTextBoxColumn.DataPropertyName = "Societe";
            this.societeDataGridViewTextBoxColumn.HeaderText = "Societe";
            this.societeDataGridViewTextBoxColumn.Name = "societeDataGridViewTextBoxColumn";
            this.societeDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // nEmployéDataGridViewTextBoxColumn
            // 
            this.nEmployéDataGridViewTextBoxColumn.DataPropertyName = "N° employé";
            this.nEmployéDataGridViewTextBoxColumn.HeaderText = "N° employé";
            this.nEmployéDataGridViewTextBoxColumn.Name = "nEmployéDataGridViewTextBoxColumn";
            this.nEmployéDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // vendeurDataGridViewTextBoxColumn
            // 
            this.vendeurDataGridViewTextBoxColumn.DataPropertyName = "Vendeur";
            this.vendeurDataGridViewTextBoxColumn.HeaderText = "Vendeur";
            this.vendeurDataGridViewTextBoxColumn.Name = "vendeurDataGridViewTextBoxColumn";
            this.vendeurDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // datecommandeDataGridViewTextBoxColumn
            // 
            this.datecommandeDataGridViewTextBoxColumn.DataPropertyName = "Date_commande";
            this.datecommandeDataGridViewTextBoxColumn.HeaderText = "Date_commande";
            this.datecommandeDataGridViewTextBoxColumn.Name = "datecommandeDataGridViewTextBoxColumn";
            this.datecommandeDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // alivreravantDataGridViewTextBoxColumn
            // 
            this.alivreravantDataGridViewTextBoxColumn.DataPropertyName = "a_livrer_avant";
            this.alivreravantDataGridViewTextBoxColumn.HeaderText = "a_livrer_avant";
            this.alivreravantDataGridViewTextBoxColumn.Name = "alivreravantDataGridViewTextBoxColumn";
            this.alivreravantDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // dateenvoiDataGridViewTextBoxColumn
            // 
            this.dateenvoiDataGridViewTextBoxColumn.DataPropertyName = "Date_envoi";
            this.dateenvoiDataGridViewTextBoxColumn.HeaderText = "Date_envoi";
            this.dateenvoiDataGridViewTextBoxColumn.Name = "dateenvoiDataGridViewTextBoxColumn";
            this.dateenvoiDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // nomdumessagerDataGridViewTextBoxColumn
            // 
            this.nomdumessagerDataGridViewTextBoxColumn.DataPropertyName = "Nom_du_messager";
            this.nomdumessagerDataGridViewTextBoxColumn.HeaderText = "Nom_du_messager";
            this.nomdumessagerDataGridViewTextBoxColumn.Name = "nomdumessagerDataGridViewTextBoxColumn";
            this.nomdumessagerDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // nomduproduitDataGridViewTextBoxColumn
            // 
            this.nomduproduitDataGridViewTextBoxColumn.DataPropertyName = "Nom_du_produit";
            this.nomduproduitDataGridViewTextBoxColumn.HeaderText = "Nom_du_produit";
            this.nomduproduitDataGridViewTextBoxColumn.Name = "nomduproduitDataGridViewTextBoxColumn";
            this.nomduproduitDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // prixunitaireDataGridViewTextBoxColumn
            // 
            this.prixunitaireDataGridViewTextBoxColumn.DataPropertyName = "Prix_unitaire";
            this.prixunitaireDataGridViewTextBoxColumn.HeaderText = "Prix_unitaire";
            this.prixunitaireDataGridViewTextBoxColumn.Name = "prixunitaireDataGridViewTextBoxColumn";
            this.prixunitaireDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // quantiteDataGridViewTextBoxColumn
            // 
            this.quantiteDataGridViewTextBoxColumn.DataPropertyName = "Quantite";
            this.quantiteDataGridViewTextBoxColumn.HeaderText = "Quantite";
            this.quantiteDataGridViewTextBoxColumn.Name = "quantiteDataGridViewTextBoxColumn";
            this.quantiteDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // remiseDataGridViewTextBoxColumn
            // 
            this.remiseDataGridViewTextBoxColumn.DataPropertyName = "Remise";
            this.remiseDataGridViewTextBoxColumn.HeaderText = "Remise";
            this.remiseDataGridViewTextBoxColumn.Name = "remiseDataGridViewTextBoxColumn";
            this.remiseDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // prixTotalDataGridViewTextBoxColumn
            // 
            this.prixTotalDataGridViewTextBoxColumn.DataPropertyName = "PrixTotal";
            this.prixTotalDataGridViewTextBoxColumn.HeaderText = "PrixTotal";
            this.prixTotalDataGridViewTextBoxColumn.Name = "prixTotalDataGridViewTextBoxColumn";
            this.prixTotalDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // portDataGridViewTextBoxColumn
            // 
            this.portDataGridViewTextBoxColumn.DataPropertyName = "Port";
            this.portDataGridViewTextBoxColumn.HeaderText = "Port";
            this.portDataGridViewTextBoxColumn.Name = "portDataGridViewTextBoxColumn";
            this.portDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // listeCommandeBindingSource
            // 
            this.listeCommandeBindingSource.DataMember = "listeCommande";
            this.listeCommandeBindingSource.DataSource = this.gestion_comptoirDataSet;
            // 
            // gestion_comptoirDataSet
            // 
            this.gestion_comptoirDataSet.DataSetName = "gestion_comptoirDataSet";
            this.gestion_comptoirDataSet.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // listeCommandeTableAdapter
            // 
            this.listeCommandeTableAdapter.ClearBeforeFill = true;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(706, 407);
            this.Controls.Add(this.dataGridView1);
            this.Controls.Add(this.btn_import_xml);
            this.Controls.Add(this.btn_add_commande);
            this.Name = "Form1";
            this.Text = "Gestion Comptoire | Liste  Commandes";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.listeCommandeBindingSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion
        private System.Windows.Forms.Button btn_add_commande;
        private System.Windows.Forms.Button btn_import_xml;
        private System.Windows.Forms.DataGridView dataGridView1;
        private Gestion_comptoir.gestion_comptoirDataSet gestion_comptoirDataSet;
        private System.Windows.Forms.BindingSource listeCommandeBindingSource;
        private Gestion_comptoir.gestion_comptoirDataSetTableAdapters.listeCommandeTableAdapter listeCommandeTableAdapter;
        private System.Windows.Forms.DataGridViewTextBoxColumn codeclientDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn refproduitDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn ncommandeDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn destinataireDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn adresselivraisonDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn villeLivraisonDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn regionlivraisonDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn codepostallivraisonDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn payslivraisonDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn societeDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn nEmployéDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn vendeurDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn datecommandeDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn alivreravantDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn dateenvoiDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn nomdumessagerDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn nomduproduitDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn prixunitaireDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn quantiteDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn remiseDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn prixTotalDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn portDataGridViewTextBoxColumn;
    }
}

