using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace WindowsFormsApp3
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
          DataTable dtb = new DataTable();

        private void Form1_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'gestion_comptoirDataSet.listeCommande' table. You can move, or remove it, as needed.
            this.listeCommandeTableAdapter.Fill(this.gestion_comptoirDataSet.listeCommande);
            // TODO: This line of code loads data into the 'gestion_comptoirDataSet.listeCommande' table. You can move, or remove it, as needed.


        }

        private void btn_add_commande_Click(object sender, EventArgs e)
        {
            //dataGridView1.AllowUserToAddRows = true;
            //dataGridView1.ReadOnly = false;
            Gestion_comptoir.frmAddCommande fne = new Gestion_comptoir.frmAddCommande();
            fne.ShowDialog();


        }

        private void btn_edit_commande_Click(object sender, EventArgs e)
        {
            dataGridView1.AllowUserToAddRows = true;
            dataGridView1.ReadOnly = false;

        }

        private void btn_import_xml_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection(@"Data Source=ME-PC\SQLEXPRESS;Initial Catalog='gestion_comptoir';Integrated Security=True");
            SqlCommand command = new SqlCommand("EXEC listeCommande", con);
            command.CommandType = CommandType.Text;
            SqlDataAdapter da = new SqlDataAdapter(command);
            DataSet ds = new DataSet();
            da.Fill(ds, "commande");

            ds.WriteXml("commande.xml");
        }
    }
}
