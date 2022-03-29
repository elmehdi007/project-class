namespace Gestion_comptoir
{
    partial class frmAddCommande
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
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
            this.comboBoxCodeClient = new System.Windows.Forms.ComboBox();
            this.clientsBindingSource = new System.Windows.Forms.BindingSource(this.components);
            this.gestion_comptoirDataSet1 = new Gestion_comptoir.gestion_comptoirDataSet1();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.comboBoxEmplyer = new System.Windows.Forms.ComboBox();
            this.employésBindingSource = new System.Windows.Forms.BindingSource(this.components);
            this.gestion_comptoirDataSet2 = new Gestion_comptoir.gestion_comptoirDataSet2();
            this.dateTimePickerDateCommande = new System.Windows.Forms.DateTimePicker();
            this.dateTimePickerALivreAvnt = new System.Windows.Forms.DateTimePicker();
            this.dateTimePickerDateEnvoi = new System.Windows.Forms.DateTimePicker();
            this.label3 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.comboBoxMessager = new System.Windows.Forms.ComboBox();
            this.messagersBindingSource = new System.Windows.Forms.BindingSource(this.components);
            this.gestion_comptoirDataSet31 = new Gestion_comptoir.gestion_comptoirDataSet3();
            this.textBoxPort = new System.Windows.Forms.TextBox();
            this.label7 = new System.Windows.Forms.Label();
            this.button1 = new System.Windows.Forms.Button();
            this.button2 = new System.Windows.Forms.Button();
            this.clientsTableAdapter = new Gestion_comptoir.gestion_comptoirDataSet1TableAdapters.ClientsTableAdapter();
            this.employésTableAdapter = new Gestion_comptoir.gestion_comptoirDataSet2TableAdapters.EmployésTableAdapter();
            this.gestion_comptoirDataSet3 = new Gestion_comptoir.gestion_comptoirDataSet();
            this.label8 = new System.Windows.Forms.Label();
            this.textBoxPays = new System.Windows.Forms.TextBox();
            this.label9 = new System.Windows.Forms.Label();
            this.textBoxVille = new System.Windows.Forms.TextBox();
            this.label10 = new System.Windows.Forms.Label();
            this.textBoxAdresse = new System.Windows.Forms.TextBox();
            this.label11 = new System.Windows.Forms.Label();
            this.textBoxCodePostale = new System.Windows.Forms.TextBox();
            this.label12 = new System.Windows.Forms.Label();
            this.textBoxDestinataire = new System.Windows.Forms.TextBox();
            this.label13 = new System.Windows.Forms.Label();
            this.textBoxRegion = new System.Windows.Forms.TextBox();
            this.messagersTableAdapter = new Gestion_comptoir.gestion_comptoirDataSet3TableAdapters.MessagersTableAdapter();
            this.gestion_comptoirDataSet4 = new Gestion_comptoir.gestion_comptoirDataSet();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.label16 = new System.Windows.Forms.Label();
            this.textBoxRemise = new System.Windows.Forms.TextBox();
            this.label15 = new System.Windows.Forms.Label();
            this.textBoxQuantite = new System.Windows.Forms.TextBox();
            this.label14 = new System.Windows.Forms.Label();
            this.textBoxPrixUnitaire = new System.Windows.Forms.TextBox();
            this.comboBoxProduit = new System.Windows.Forms.ComboBox();
            this.produitsBindingSource1 = new System.Windows.Forms.BindingSource(this.components);
            this.gestion_comptoirDataSet5 = new Gestion_comptoir.gestion_comptoirDataSet5();
            this.gestion_comptoirDataSet41 = new Gestion_comptoir.gestion_comptoirDataSet4();
            this.produitsBindingSource = new System.Windows.Forms.BindingSource(this.components);
            this.produitsTableAdapter = new Gestion_comptoir.gestion_comptoirDataSet4TableAdapters.ProduitsTableAdapter();
            this.produitsTableAdapter1 = new Gestion_comptoir.gestion_comptoirDataSet5TableAdapters.ProduitsTableAdapter();
            ((System.ComponentModel.ISupportInitialize)(this.clientsBindingSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.employésBindingSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.messagersBindingSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet31)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet3)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet4)).BeginInit();
            this.groupBox1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.produitsBindingSource1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet5)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet41)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.produitsBindingSource)).BeginInit();
            this.SuspendLayout();
            // 
            // comboBoxCodeClient
            // 
            this.comboBoxCodeClient.DataBindings.Add(new System.Windows.Forms.Binding("SelectedValue", this.clientsBindingSource, "Société", true));
            this.comboBoxCodeClient.DataSource = this.clientsBindingSource;
            this.comboBoxCodeClient.DisplayMember = "Code client";
            this.comboBoxCodeClient.FormattingEnabled = true;
            this.comboBoxCodeClient.Location = new System.Drawing.Point(107, 26);
            this.comboBoxCodeClient.Name = "comboBoxCodeClient";
            this.comboBoxCodeClient.Size = new System.Drawing.Size(228, 21);
            this.comboBoxCodeClient.TabIndex = 0;
            this.comboBoxCodeClient.ValueMember = "Code client";
            this.comboBoxCodeClient.SelectedIndexChanged += new System.EventHandler(this.comboBoxCodeClient_SelectedIndexChanged);
            // 
            // clientsBindingSource
            // 
            this.clientsBindingSource.DataMember = "Clients";
            this.clientsBindingSource.DataSource = this.gestion_comptoirDataSet1;
            // 
            // gestion_comptoirDataSet1
            // 
            this.gestion_comptoirDataSet1.DataSetName = "gestion_comptoirDataSet1";
            this.gestion_comptoirDataSet1.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(21, 26);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(60, 13);
            this.label1.TabIndex = 1;
            this.label1.Text = "Code client";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(21, 69);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(49, 13);
            this.label2.TabIndex = 3;
            this.label2.Text = "employer";
            // 
            // comboBoxEmplyer
            // 
            this.comboBoxEmplyer.DataBindings.Add(new System.Windows.Forms.Binding("SelectedValue", this.employésBindingSource, "N° employé", true));
            this.comboBoxEmplyer.DataSource = this.employésBindingSource;
            this.comboBoxEmplyer.DisplayMember = "N° employé";
            this.comboBoxEmplyer.FormattingEnabled = true;
            this.comboBoxEmplyer.Location = new System.Drawing.Point(107, 66);
            this.comboBoxEmplyer.Name = "comboBoxEmplyer";
            this.comboBoxEmplyer.Size = new System.Drawing.Size(228, 21);
            this.comboBoxEmplyer.TabIndex = 2;
            this.comboBoxEmplyer.ValueMember = "N° employé";
            // 
            // employésBindingSource
            // 
            this.employésBindingSource.DataMember = "Employés";
            this.employésBindingSource.DataSource = this.gestion_comptoirDataSet2;
            // 
            // gestion_comptoirDataSet2
            // 
            this.gestion_comptoirDataSet2.DataSetName = "gestion_comptoirDataSet2";
            this.gestion_comptoirDataSet2.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // dateTimePickerDateCommande
            // 
            this.dateTimePickerDateCommande.Location = new System.Drawing.Point(24, 209);
            this.dateTimePickerDateCommande.Name = "dateTimePickerDateCommande";
            this.dateTimePickerDateCommande.Size = new System.Drawing.Size(200, 20);
            this.dateTimePickerDateCommande.TabIndex = 4;
            // 
            // dateTimePickerALivreAvnt
            // 
            this.dateTimePickerALivreAvnt.Location = new System.Drawing.Point(261, 209);
            this.dateTimePickerALivreAvnt.Name = "dateTimePickerALivreAvnt";
            this.dateTimePickerALivreAvnt.Size = new System.Drawing.Size(200, 20);
            this.dateTimePickerALivreAvnt.TabIndex = 5;
            // 
            // dateTimePickerDateEnvoi
            // 
            this.dateTimePickerDateEnvoi.Location = new System.Drawing.Point(493, 209);
            this.dateTimePickerDateEnvoi.Name = "dateTimePickerDateEnvoi";
            this.dateTimePickerDateEnvoi.Size = new System.Drawing.Size(200, 20);
            this.dateTimePickerDateEnvoi.TabIndex = 6;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(24, 193);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(83, 13);
            this.label3.TabIndex = 7;
            this.label3.Text = "date commande";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(258, 193);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(69, 13);
            this.label4.TabIndex = 8;
            this.label4.Text = "À livrer avant";
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(490, 193);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(59, 13);
            this.label5.TabIndex = 9;
            this.label5.Text = "Date envoi";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(21, 105);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(53, 13);
            this.label6.TabIndex = 11;
            this.label6.Text = "Messager";
            // 
            // comboBoxMessager
            // 
            this.comboBoxMessager.DataBindings.Add(new System.Windows.Forms.Binding("SelectedValue", this.messagersBindingSource, "N° messager", true));
            this.comboBoxMessager.DataSource = this.messagersBindingSource;
            this.comboBoxMessager.DisplayMember = "N° messager";
            this.comboBoxMessager.FormattingEnabled = true;
            this.comboBoxMessager.Location = new System.Drawing.Point(107, 102);
            this.comboBoxMessager.Name = "comboBoxMessager";
            this.comboBoxMessager.Size = new System.Drawing.Size(228, 21);
            this.comboBoxMessager.TabIndex = 10;
            this.comboBoxMessager.ValueMember = "N° messager";
            // 
            // messagersBindingSource
            // 
            this.messagersBindingSource.DataMember = "Messagers";
            this.messagersBindingSource.DataSource = this.gestion_comptoirDataSet31;
            // 
            // gestion_comptoirDataSet31
            // 
            this.gestion_comptoirDataSet31.DataSetName = "gestion_comptoirDataSet3";
            this.gestion_comptoirDataSet31.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // textBoxPort
            // 
            this.textBoxPort.Location = new System.Drawing.Point(107, 138);
            this.textBoxPort.Name = "textBoxPort";
            this.textBoxPort.Size = new System.Drawing.Size(228, 20);
            this.textBoxPort.TabIndex = 12;
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(21, 141);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(25, 13);
            this.label7.TabIndex = 13;
            this.label7.Text = "port";
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(563, 363);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(75, 23);
            this.button1.TabIndex = 14;
            this.button1.Text = "Comfirmer";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // button2
            // 
            this.button2.Location = new System.Drawing.Point(644, 363);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(75, 23);
            this.button2.TabIndex = 15;
            this.button2.Text = "Annuler";
            this.button2.UseVisualStyleBackColor = true;
            this.button2.Click += new System.EventHandler(this.button2_Click);
            // 
            // clientsTableAdapter
            // 
            this.clientsTableAdapter.ClearBeforeFill = true;
            // 
            // employésTableAdapter
            // 
            this.employésTableAdapter.ClearBeforeFill = true;
            // 
            // gestion_comptoirDataSet3
            // 
            this.gestion_comptoirDataSet3.DataSetName = "gestion_comptoirDataSet";
            this.gestion_comptoirDataSet3.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Location = new System.Drawing.Point(391, 65);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(77, 13);
            this.label8.TabIndex = 17;
            this.label8.Text = "Pays laivraison";
            // 
            // textBoxPays
            // 
            this.textBoxPays.Location = new System.Drawing.Point(477, 62);
            this.textBoxPays.Name = "textBoxPays";
            this.textBoxPays.Size = new System.Drawing.Size(228, 20);
            this.textBoxPays.TabIndex = 16;
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Location = new System.Drawing.Point(391, 91);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(66, 13);
            this.label9.TabIndex = 19;
            this.label9.Text = "ville livraison";
            // 
            // textBoxVille
            // 
            this.textBoxVille.Location = new System.Drawing.Point(477, 88);
            this.textBoxVille.Name = "textBoxVille";
            this.textBoxVille.Size = new System.Drawing.Size(228, 20);
            this.textBoxVille.TabIndex = 18;
            // 
            // label10
            // 
            this.label10.AutoSize = true;
            this.label10.Location = new System.Drawing.Point(391, 137);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(45, 13);
            this.label10.TabIndex = 21;
            this.label10.Text = "Adresse";
            // 
            // textBoxAdresse
            // 
            this.textBoxAdresse.Location = new System.Drawing.Point(477, 134);
            this.textBoxAdresse.Name = "textBoxAdresse";
            this.textBoxAdresse.Size = new System.Drawing.Size(228, 20);
            this.textBoxAdresse.TabIndex = 20;
            // 
            // label11
            // 
            this.label11.AutoSize = true;
            this.label11.Location = new System.Drawing.Point(391, 163);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(70, 13);
            this.label11.TabIndex = 23;
            this.label11.Text = "Code Postale";
            // 
            // textBoxCodePostale
            // 
            this.textBoxCodePostale.Location = new System.Drawing.Point(477, 160);
            this.textBoxCodePostale.Name = "textBoxCodePostale";
            this.textBoxCodePostale.Size = new System.Drawing.Size(228, 20);
            this.textBoxCodePostale.TabIndex = 22;
            // 
            // label12
            // 
            this.label12.AutoSize = true;
            this.label12.Location = new System.Drawing.Point(394, 29);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(63, 13);
            this.label12.TabIndex = 25;
            this.label12.Text = "Destinataire";
            // 
            // textBoxDestinataire
            // 
            this.textBoxDestinataire.Location = new System.Drawing.Point(477, 23);
            this.textBoxDestinataire.Name = "textBoxDestinataire";
            this.textBoxDestinataire.Size = new System.Drawing.Size(228, 20);
            this.textBoxDestinataire.TabIndex = 24;
            // 
            // label13
            // 
            this.label13.AutoSize = true;
            this.label13.Location = new System.Drawing.Point(391, 114);
            this.label13.Name = "label13";
            this.label13.Size = new System.Drawing.Size(41, 13);
            this.label13.TabIndex = 27;
            this.label13.Text = "Region";
            // 
            // textBoxRegion
            // 
            this.textBoxRegion.Location = new System.Drawing.Point(477, 111);
            this.textBoxRegion.Name = "textBoxRegion";
            this.textBoxRegion.Size = new System.Drawing.Size(228, 20);
            this.textBoxRegion.TabIndex = 26;
            // 
            // messagersTableAdapter
            // 
            this.messagersTableAdapter.ClearBeforeFill = true;
            // 
            // gestion_comptoirDataSet4
            // 
            this.gestion_comptoirDataSet4.DataSetName = "gestion_comptoirDataSet";
            this.gestion_comptoirDataSet4.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.label16);
            this.groupBox1.Controls.Add(this.textBoxRemise);
            this.groupBox1.Controls.Add(this.label15);
            this.groupBox1.Controls.Add(this.textBoxQuantite);
            this.groupBox1.Controls.Add(this.label14);
            this.groupBox1.Controls.Add(this.textBoxPrixUnitaire);
            this.groupBox1.Controls.Add(this.comboBoxProduit);
            this.groupBox1.Location = new System.Drawing.Point(-1, 245);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(729, 65);
            this.groupBox1.TabIndex = 28;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Produit";
            this.groupBox1.Enter += new System.EventHandler(this.groupBox1_Enter);
            // 
            // label16
            // 
            this.label16.AutoSize = true;
            this.label16.Location = new System.Drawing.Point(487, 12);
            this.label16.Name = "label16";
            this.label16.Size = new System.Drawing.Size(37, 13);
            this.label16.TabIndex = 32;
            this.label16.Text = "remise";
            // 
            // textBoxRemise
            // 
            this.textBoxRemise.Location = new System.Drawing.Point(490, 28);
            this.textBoxRemise.Name = "textBoxRemise";
            this.textBoxRemise.Size = new System.Drawing.Size(147, 20);
            this.textBoxRemise.TabIndex = 33;
            // 
            // label15
            // 
            this.label15.AutoSize = true;
            this.label15.Location = new System.Drawing.Point(334, 13);
            this.label15.Name = "label15";
            this.label15.Size = new System.Drawing.Size(47, 13);
            this.label15.TabIndex = 30;
            this.label15.Text = "Quantite";
            // 
            // textBoxQuantite
            // 
            this.textBoxQuantite.Location = new System.Drawing.Point(337, 29);
            this.textBoxQuantite.Name = "textBoxQuantite";
            this.textBoxQuantite.Size = new System.Drawing.Size(147, 20);
            this.textBoxQuantite.TabIndex = 31;
            // 
            // label14
            // 
            this.label14.AutoSize = true;
            this.label14.Location = new System.Drawing.Point(180, 12);
            this.label14.Name = "label14";
            this.label14.Size = new System.Drawing.Size(63, 13);
            this.label14.TabIndex = 29;
            this.label14.Text = "Prix Unitaire";
            this.label14.Click += new System.EventHandler(this.label14_Click);
            // 
            // textBoxPrixUnitaire
            // 
            this.textBoxPrixUnitaire.Location = new System.Drawing.Point(183, 28);
            this.textBoxPrixUnitaire.Name = "textBoxPrixUnitaire";
            this.textBoxPrixUnitaire.Size = new System.Drawing.Size(147, 20);
            this.textBoxPrixUnitaire.TabIndex = 29;
            // 
            // comboBoxProduit
            // 
            this.comboBoxProduit.DataBindings.Add(new System.Windows.Forms.Binding("SelectedValue", this.produitsBindingSource1, "Réf produit", true));
            this.comboBoxProduit.DataSource = this.produitsBindingSource1;
            this.comboBoxProduit.DisplayMember = "Réf produit";
            this.comboBoxProduit.FormattingEnabled = true;
            this.comboBoxProduit.Location = new System.Drawing.Point(28, 28);
            this.comboBoxProduit.Name = "comboBoxProduit";
            this.comboBoxProduit.Size = new System.Drawing.Size(144, 21);
            this.comboBoxProduit.TabIndex = 29;
            this.comboBoxProduit.ValueMember = "Réf produit";
            this.comboBoxProduit.SelectedIndexChanged += new System.EventHandler(this.comboBox1_SelectedIndexChanged);
            // 
            // produitsBindingSource1
            // 
            this.produitsBindingSource1.DataMember = "Produits";
            this.produitsBindingSource1.DataSource = this.gestion_comptoirDataSet5;
            // 
            // gestion_comptoirDataSet5
            // 
            this.gestion_comptoirDataSet5.DataSetName = "gestion_comptoirDataSet5";
            this.gestion_comptoirDataSet5.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // gestion_comptoirDataSet41
            // 
            this.gestion_comptoirDataSet41.DataSetName = "gestion_comptoirDataSet4";
            this.gestion_comptoirDataSet41.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // produitsBindingSource
            // 
            this.produitsBindingSource.DataMember = "Produits";
            this.produitsBindingSource.DataSource = this.gestion_comptoirDataSet41;
            // 
            // produitsTableAdapter
            // 
            this.produitsTableAdapter.ClearBeforeFill = true;
            // 
            // produitsTableAdapter1
            // 
            this.produitsTableAdapter1.ClearBeforeFill = true;
            // 
            // frmAddCommande
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(727, 409);
            this.Controls.Add(this.groupBox1);
            this.Controls.Add(this.label13);
            this.Controls.Add(this.textBoxRegion);
            this.Controls.Add(this.label12);
            this.Controls.Add(this.textBoxDestinataire);
            this.Controls.Add(this.label11);
            this.Controls.Add(this.textBoxCodePostale);
            this.Controls.Add(this.label10);
            this.Controls.Add(this.textBoxAdresse);
            this.Controls.Add(this.label9);
            this.Controls.Add(this.textBoxVille);
            this.Controls.Add(this.label8);
            this.Controls.Add(this.textBoxPays);
            this.Controls.Add(this.button2);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.label7);
            this.Controls.Add(this.textBoxPort);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.comboBoxMessager);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.dateTimePickerDateEnvoi);
            this.Controls.Add(this.dateTimePickerALivreAvnt);
            this.Controls.Add(this.dateTimePickerDateCommande);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.comboBoxEmplyer);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.comboBoxCodeClient);
            this.Name = "frmAddCommande";
            this.Text = "Gestion Comptoire | Ajouter  Commandes";
            this.Load += new System.EventHandler(this.frmAddCommande_Load);
            ((System.ComponentModel.ISupportInitialize)(this.clientsBindingSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.employésBindingSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.messagersBindingSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet31)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet3)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet4)).EndInit();
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.produitsBindingSource1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet5)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.gestion_comptoirDataSet41)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.produitsBindingSource)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ComboBox comboBoxCodeClient;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.ComboBox comboBoxEmplyer;
        private System.Windows.Forms.DateTimePicker dateTimePickerDateCommande;
        private System.Windows.Forms.DateTimePicker dateTimePickerALivreAvnt;
        private System.Windows.Forms.DateTimePicker dateTimePickerDateEnvoi;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.ComboBox comboBoxMessager;
        private System.Windows.Forms.TextBox textBoxPort;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button button2;
        private gestion_comptoirDataSet1 gestion_comptoirDataSet1;
        private System.Windows.Forms.BindingSource clientsBindingSource;
        private gestion_comptoirDataSet1TableAdapters.ClientsTableAdapter clientsTableAdapter;
        private gestion_comptoirDataSet2 gestion_comptoirDataSet2;
        private System.Windows.Forms.BindingSource employésBindingSource;
        private gestion_comptoirDataSet2TableAdapters.EmployésTableAdapter employésTableAdapter;
        private gestion_comptoirDataSet gestion_comptoirDataSet3;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.TextBox textBoxPays;
        private System.Windows.Forms.Label label9;
        private System.Windows.Forms.TextBox textBoxVille;
        private System.Windows.Forms.Label label10;
        private System.Windows.Forms.TextBox textBoxAdresse;
        private System.Windows.Forms.Label label11;
        private System.Windows.Forms.TextBox textBoxCodePostale;
        private System.Windows.Forms.Label label12;
        private System.Windows.Forms.TextBox textBoxDestinataire;
        private System.Windows.Forms.Label label13;
        private System.Windows.Forms.TextBox textBoxRegion;
        private gestion_comptoirDataSet3 gestion_comptoirDataSet31;
        private System.Windows.Forms.BindingSource messagersBindingSource;
        private gestion_comptoirDataSet3TableAdapters.MessagersTableAdapter messagersTableAdapter;
        private gestion_comptoirDataSet gestion_comptoirDataSet4;
        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.ComboBox comboBoxProduit;
        private System.Windows.Forms.Label label14;
        private System.Windows.Forms.TextBox textBoxPrixUnitaire;
        private System.Windows.Forms.Label label15;
        private System.Windows.Forms.TextBox textBoxQuantite;
        private System.Windows.Forms.Label label16;
        private System.Windows.Forms.TextBox textBoxRemise;
        private gestion_comptoirDataSet4 gestion_comptoirDataSet41;
        private System.Windows.Forms.BindingSource produitsBindingSource;
        private gestion_comptoirDataSet4TableAdapters.ProduitsTableAdapter produitsTableAdapter;
        private gestion_comptoirDataSet5 gestion_comptoirDataSet5;
        private System.Windows.Forms.BindingSource produitsBindingSource1;
        private gestion_comptoirDataSet5TableAdapters.ProduitsTableAdapter produitsTableAdapter1;
    }
}