using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace Gestion_comptoir
{
    public partial class frmAddCommande : Form
    {
        public frmAddCommande()
        {
            InitializeComponent();
        }
        SqlConnection con = new SqlConnection(@"Data Source=ME-PC\SQLEXPRESS;Initial Catalog='gestion_comptoir';Integrated Security=True");

        private void frmAddCommande_Load(object sender, EventArgs e)
        {
            con.Open();
            // TODO: This line of code loads data into the 'gestion_comptoirDataSet5.Produits' table. You can move, or remove it, as needed.
            this.produitsTableAdapter1.Fill(this.gestion_comptoirDataSet5.Produits);
            // TODO: This line of code loads data into the 'gestion_comptoirDataSet41.Produits' table. You can move, or remove it, as needed.
            this.produitsTableAdapter.Fill(this.gestion_comptoirDataSet41.Produits);
            // TODO: This line of code loads data into the 'gestion_comptoirDataSet31.Messagers' table. You can move, or remove it, as needed.
            this.messagersTableAdapter.Fill(this.gestion_comptoirDataSet31.Messagers);

            // TODO: This line of code loads data into the 'gestion_comptoirDataSet2.Employés' table. You can move, or remove it, as needed.
            this.employésTableAdapter.Fill(this.gestion_comptoirDataSet2.Employés);
            // TODO: This line of code loads data into the 'gestion_comptoirDataSet1.Clients' table. You can move, or remove it, as needed.
            this.clientsTableAdapter.Fill(this.gestion_comptoirDataSet1.Clients);
            SqlCommand command = new SqlCommand("EXEC listeCommande", con);
            command.CommandType = CommandType.Text;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button1_Click(object sender, EventArgs e)
        {


            bool etat = true;
            string sql = "INSERT INTO [commandes] ( [Code client ] , [N° employé ] , [Date commande ] , [À livrer avant ] , [Date envoi ] , [N° messager ] , [Port ] , [Destinataire ] , [Adresse livraison ] , [Ville livraison ] , [Région livraison ] , [Code postal livraison ] , [Pays livraison]) values ";
            sql += "( '" + comboBoxCodeClient.Text + "', '" + comboBoxEmplyer.Text + "', '" + dateTimePickerDateCommande.Value.Year+"-"+ dateTimePickerDateCommande.Value.Month+"-"+ dateTimePickerDateCommande.Value.Day + "' ,'" + dateTimePickerALivreAvnt.Value.Year + "-" + dateTimePickerALivreAvnt.Value.Month + "-" + dateTimePickerALivreAvnt.Value.Day + "', '" + dateTimePickerDateEnvoi.Value.Year + "-" + dateTimePickerDateEnvoi.Value.Month + "-"+dateTimePickerDateEnvoi.Value.Day + "', ' " + comboBoxMessager.Text +"' , '"+ textBoxPort.Text + "',' " + textBoxDestinataire.Text + "',' " + textBoxAdresse.Text + "', '" + textBoxVille.Text + "', '" + textBoxRegion.Text + "', '" + textBoxCodePostale.Text + "' ,'" + textBoxPays.Text + "')";      
            //MessageBox.Show(sql); return;
            SqlCommand command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;

            if (command.ExecuteNonQuery() < 0)
            {
                //MessageBox.Show("ereur");
                etat = false;
            }
            sql = "select MAX([N° commande]) as max_ from Commandes order by max_  desc";
            command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;
             int maxNumCommande= (int)(command.ExecuteScalar());

            sql = "insert into [Détails commandes]([N° commande],[Réf produit],[Prix unitaire],[Quantité],[Remise])";
            sql += " values ( '" + maxNumCommande + "', '" + comboBoxProduit.Text + "', '" + textBoxPrixUnitaire.Text+ "' ,'" + textBoxQuantite.Text + "' ,'" + ((int.Parse(textBoxRemise.Text)/100)) + "')";
            //MessageBox.Show(sql); return;
             command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;

            if (command.ExecuteNonQuery() < 0)
            {
                //MessageBox.Show("ereur");
                etat = false;
            }
            if (etat) {
                 MessageBox.Show("Commande ajouter");

            }

        }

        private void label14_Click(object sender, EventArgs e)
        {

        }

        private void comboBoxCodeClient_SelectedIndexChanged(object sender, EventArgs e)
        {
            string sql = "select [Société] from Clients where [Code client]='" + comboBoxCodeClient.Text + "'";
            SqlCommand command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;
            textBoxDestinataire.Text = (command.ExecuteScalar()).ToString();


             sql = "select [pays] from Clients where [Code client]='" + comboBoxCodeClient.Text + "'";
             command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;
            textBoxPays.Text = (command.ExecuteScalar()).ToString();

             sql = "select [Ville] from Clients where [Code client]='" + comboBoxCodeClient.Text + "'";
             command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;
            textBoxVille.Text = (command.ExecuteScalar()).ToString();

             sql = "select [Région] from Clients where [Code client]='" + comboBoxCodeClient.Text + "'";
             command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;
            textBoxRegion.Text = (command.ExecuteScalar()).ToString();

             sql = "select [Adresse] from Clients where [Code client]='" + comboBoxCodeClient.Text + "'";
             command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;
            textBoxAdresse.Text = (command.ExecuteScalar()).ToString();

             sql = "select [code postal] from Clients where [Code client]='" + comboBoxCodeClient.Text + "'";
             command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;
            textBoxCodePostale.Text = (command.ExecuteScalar()).ToString();
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            string sql = "select [Prix unitaire] from Produits where [Réf produit ]='" + comboBoxProduit.Text + "'";
            SqlCommand command = new SqlCommand(sql, con);
            command.CommandType = CommandType.Text;
            textBoxPrixUnitaire.Text= (command.ExecuteScalar()).ToString();
            //SqlDataReader read = command.ExecuteReader();
            //MessageBox.Show(read.RecordsAffected+"");
           // textBoxPrixUnitaire.Text = read["Prix unitaire"].ToString();
        }

        private void groupBox1_Enter(object sender, EventArgs e)
        {

        }
    }
}
