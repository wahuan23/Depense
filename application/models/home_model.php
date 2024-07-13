<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Home_Model extends CI_Model 
    {
        public function __construct() {
            $this->load->database('default');
            $this->load->library('session'); 
       
            // Call the Model constructor
            parent::__construct();
        }
        public function checkLogin($phone)
        {
            $valiny = false;
            $sql = "select * from Utilisateur where phone='$phone'";  
            $query = $this->db->query($sql);
            $result = array();
            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }


            return $result;
        }
        public function voirOccurence($typeMivoaka) {
            $sql = "SELECT occurence FROM Type_Mivoaka WHERE id_Type_Mivoaka = ?";
            $query = $this->db->query($sql, array($typeMivoaka));
            $result = $query->row();
            if ($result) {
                return $result->occurence;
            } else {
                return 0; // Default value or handle as needed
            }
        }
        public function verifierHistorique($year,$month,$days_in_month) {
            $month = str_pad($month, 2, '0', STR_PAD_LEFT);
            $days_in_month = str_pad($days_in_month, 2, '0', STR_PAD_LEFT);
        
            $date_debut = $year . '-' . $month . '-01';
            $date_fin = $year . '-' . $month . '-' . $days_in_month;
            $sql ="SELECT * FROM V_Depense_Total WHERE date_debut = '$date_fin' or date_fin ='$date_fin'";
            $query = $this->db->query($sql);
            $result = array();
            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
           
        }
        
        public function insertDepense($depense, $days_in_month, $month, $years, $quantite) {
            // Ensure month and day values are always two digits
            $month = str_pad($month, 2, '0', STR_PAD_LEFT);
            $days_in_month = str_pad($days_in_month, 2, '0', STR_PAD_LEFT);
        
            $date_debut = $years . '-' . $month . '-01';
            $date_fin = $years . '-' . $month . '-' . $days_in_month;
        
            // Fetch prix_unitaire from the database
            $query = $this->db->query("SELECT prix_unitaire FROM Type_Mivoaka WHERE id_Type_Mivoaka = ?", [$depense]);
            $result = $query->row();
            if ($result) {
                $prix_unitaire = $result->prix_unitaire;
            } else {
                // Handle the case where the prix_unitaire is not found
                // For now, we'll return false to indicate failure
                return false;
            }
        
            // Insert data into Vola_Mivoaka
            $sql = "INSERT INTO Vola_Mivoaka (id_Type_Mivoaka, id_Vola_Miditra, date_debut, date_fin, quantite, prix_unitaire)
                    VALUES (?, 'VMD1', ?, ?, ?, ?)";
            $query = $this->db->query($sql, [$depense, $date_debut, $date_fin, $quantite, $prix_unitaire]);
        
            return $query ? true : false;
        }
        
        
        
        function voirDepenseTotal($days_in_month, $month, $years){
            $valiny = false;
            $date_debut = $years . '-' . $month . '-01';
            $sql = "select * from V_Depense_Total where date_debut=? order by id_type_mivoaka asc ";
            $query = $this->db->query($sql,$date_debut);
            $result = array();
            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }
        public function insertEntreeSortie($total,$payer)
        {   
       
            $sql = "INSERT INTO Entre_Sortie (total,montant_paye,date_paye) VALUES (?,?,current_date)";
            $query = $this->db->query($sql, array($total,$payer));
          
            if ($query) {
                return true; 
            } else {
                return false; 
            }
        }
       
        public function insertTypeMivoaka($depense, $prix)
        {
            $sql = "INSERT INTO Type_Mivoaka (type_mivoaka, prix_unitaire, occurence) VALUES (?, ?, '1')";
            $query = $this->db->query($sql, array($depense, $prix));
        
            if ($query) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
        public function insertVolaMivoaka($idtype_mivoaka, $prix, $days_in_month, $years, $month)
        {
            $month = str_pad($month, 2, '0', STR_PAD_LEFT);

            $date_debut = $years . '-' . $month . '-01';
            $date_fin = $years . '-' . $month . '-' . $days_in_month;
            $sql = "INSERT INTO Vola_mivoaka (id_type_mivoaka, id_vola_miditra, date_debut, date_fin, quantite, prix_unitaire) VALUES (?, 'VMD1', ?, ?, '1', ?)";
            $query = $this->db->query($sql, array('TMV'.$idtype_mivoaka, $date_debut, $date_fin, $prix));

            if ($query) {
                return true;
            } else {
                return false;
            }
        }
        public function ajoutEntree($total,$payer,$motif)
        {   
       
            $miditra=$payer - $total;
            $sql = "insert into Vola_Entree (montant,date_Entree,motif) values (?, current_date ,?) ";
            $query = $this->db->query($sql, array($miditra,$motif));
          
            if ($query) {
                return true; 
            } else {
                return false; 
            }
        }
        public function voirEntreSortie($argument) {
            $sql = "SELECT sum(montant) as montant from $argument";
            $query = $this->db->query($sql);
            $row = $query->row_array(); // Using row_array() to get a single row result
            return $row;
        }
        public function ajoutSolde($montant)
        {   
            $sql = "insert into Solde (montant,date_solde) values (?, current_date) ";
            $query = $this->db->query($sql, array($montant));
          
            if ($query) {
                return true; 
            } else {
                return false; 
            }
        }
        public function ajoutSortie($montant,$motif)
        {   
            $sql = "insert into Vola_Sortie (montant,date_Sortie,motif) values (?, current_date,?) ";
            $query = $this->db->query($sql, array($montant,$motif));
          
            if ($query) {
                return true; 
            } else {
                return false; 
            }
        }
        function voirTahiry(){
            $valiny = false;
            $sql = "select * from solde where id_Solde=(select max(id_Solde) from solde) ";
            $query = $this->db->query($sql);
            $result = array();
            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }
        public function supmivoaka($id_vola_mivoaka)
        {
            $sql = "delete from Vola_mivoaka where  id_vola_mivoaka='$id_vola_mivoaka'";
            $query = $this->db->query($sql);

            if ($query) {
                return true;
            } else {
                return false;
            }
        }
        public function modifTypeDepense($id_type_mivoaka,$prix_unitaire)
        {
            $sql = "update type_mivoaka set prix_unitaire = '$prix_unitaire' where id_type_mivoaka='$id_type_mivoaka'";
            $query = $this->db->query($sql);

            if ($query) {
                return true;
            } else {
                return false;
            }
        }
        function voirDepenseMois($mois,$annee){
            $valiny = false;
            $sql = "select * from Vola_Sortie WHERE EXTRACT(MONTH FROM date_sortie) = '$mois' AND EXTRACT(YEAR FROM date_sortie) = '$annee'";
            $query = $this->db->query($sql);
            $result = array();
            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }

        
    }
?>