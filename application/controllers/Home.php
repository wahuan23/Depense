<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('home_model');
        $this->load->library('session');
        $this->load->helper('date');
    }
    
    public function index()
    {
        $this->load->view('login_view');
    }

    public function login_user()
    {
        $phone = $this->input->post('phone');
    
        if (!empty($phone)) {
            $user = $this->home_model->checkLogin($phone);
    
            if ($user !== null) {
                $this->session->set_userdata('phone', $phone);
                redirect('home/accueil/' . $phone);

            } else {
                redirect('home/index');
            }
        } else {
           
            redirect('home/index');
        }
    }
    public function LoginAdmin()
    {
        $this->load->view('login_admin_view');
    }
    public function CheckLoginAdmin()
    {
        $login = $this->input->post('login');
        $phone = $this->input->post('phone');
    
        if (!empty($login &&  $phone )) {
            $user = $this->home_model->CheckLoginAdmin($login,$phone);
    
            if ($user !== null) {
                redirect('home/accueiladmin');
            } else {
                redirect('home/index');
            }
        } else {
           
            redirect('home/index');
        }


    }
   
    public function home()
    {
        $this->load->helper('url');
        $this->load->model('login_model');
    }
    public function accueil()
    {
        $data['main'] = 'home_view';       
        $this->load->view('templates/main_view', $data);
      
    }
    public function get_days_in_month() {
        $month =  $this->input->post('mois');
        $year =  $this->input->post('annee');
        if (!is_numeric($month) || !is_numeric($year) || $month < 1 || $month > 12 || $year < 1) {
            show_error('Paramètres invalides', 400);
        }

        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['month' => $month, 'year' => $year, 'days' => $days_in_month]));
            redirect('home/pageCreerBudget/' . $days_in_month . '/' . $year . '/' . $month);
        
    }
   
    public function pageCreerBudget($days_in_month, $year, $month) {
        $data['main'] = 'creer_budget_view';
        $data['days_in_month'] = $days_in_month;
        $data['years'] = $year;
        $data['month'] = $month;
        $this->session->set_userdata('days_in_month', $days_in_month);
        $this->session->set_userdata('month', $month);
        $this->session->set_userdata('years', $year);
    
        $historique = $this->home_model->verifierHistorique($year, $month, $days_in_month);
        if ($historique != null) {
            redirect('home/pageDepenseTotal/' . $days_in_month . '/' . $year . '/' . $month);
        } else {
            $this->load->view('templates/main_view', $data);
        }
    }
    
    public function insertDepense() {
        $depense = $this->input->post('depense');
        $newdepense = $this->input->post('newDepense');
        $prix = $this->input->post('Prix');
        $days_in_month = $this->input->post('days_in_month');
        $years = $this->input->post('years');
        $month = $this->input->post('month');
    
        if (!empty($depense)) {
            foreach ($depense as $typeMivoaka) {
                $occurence = $this->home_model->voirOccurence($typeMivoaka);
                if ($occurence == 2) {
                    $quantite = $days_in_month;
                    $this->home_model->insertDepense($typeMivoaka, $days_in_month, $month, $years, $quantite);
                }
                elseif ($occurence == 5){
                    $quantite =  get_workdays_in_month($years, $month);
                    $this->home_model->insertDepense($typeMivoaka, $days_in_month, $month, $years, $quantite);

                }
               
                else {
                    $quantite = 1;
                    $this->home_model->insertDepense($typeMivoaka, $days_in_month, $month, $years, $quantite);
            
                
                }
             
            }
        } else {
            echo "No expenses selected.";
        }
        redirect('home/pageDepenseTotal/' . $days_in_month . '/' . $years . '/' . $month);
    }
    public function pageDepenseTotal($days_in_month,$years,$month)
    {

        $data['main'] = 'depense_total_view';
        $data['depense'] = $this->home_model->voirDepenseTotal($days_in_month, $month, $years);
        $data['days_in_month'] = $days_in_month;
        $data['month'] = $month;
        $data['years'] = $years;
        $this->load->view('templates/main_view', $data);
    }
    public function paiementDepense($overall_total)
    {
        $data['main'] = 'paiement_depense_view';
        $data['total'] = $overall_total;
        $this->load->view('templates/main_view', $data);
    }

    public function insertDepenseTotal($total)
    {
        $this->session->set_userdata('total', $total);
        $payer = $this->input->post('montant');
        $this->session->set_userdata('payer', $payer);
        $motif='Budget mensuel';
        $days_in_month=$this->session->userdata('days_in_month');
        $month=$this->session->userdata('month');
        $years=$this->session->userdata('years');
        $this->home_model->insertEntreeSortie($total,$payer);
        
        if($payer != null and $payer > $total or $payer == $total ){
            $this->home_model->ajoutEntree($total,$payer,$motif);
            redirect('home/pageDepenseEtTotal/' . $days_in_month . '/' . $month . '/' . $years);
        }
    }
    public function pageNewDepense($days_in_month, $month, $years)
{
    $data['days_in_month'] = $days_in_month;
    $data['month'] = $month;
    $data['years'] = $years;
    $data['main'] = 'newdepense_view';
    $this->load->view('templates/main_view', $data);
}
    public function insertNewDepense()
    {
        $type_mivoaka = $this->input->post('depense');
        $prix = $this->input->post('prix');
        $days_in_month = $this->input->post('days_in_month');
        $years = $this->input->post('years');
        $month = $this->input->post('month');

        $idtype_mivoaka = $this->home_model->insertTypeMivoaka($type_mivoaka, $prix);

        if ($idtype_mivoaka) {
            $this->home_model->insertVolaMivoaka($idtype_mivoaka, $prix, $days_in_month, $years, $month);
            redirect('home/pageDepenseTotal/'. $days_in_month . '/' . $years . '/' . $month);
        }
    }

        
    
    public function pageTahiry()
    {
       
        $arg_entree = 'Vola_Entree';
        $arg_sortie = 'Vola_Sortie';
        
        $entre = $this->home_model->voirEntreSortie($arg_entree);
        $sortie = $this->home_model->voirEntreSortie($arg_sortie);
        
        $argent = $entre['montant'] - $sortie['montant']; 
        $solde = $this->home_model->ajoutSolde($argent);
        
       
        redirect('home/voirTahiry');
    }  
    public function voirTahiry()
    {     
        $data['main'] = 'tahiry_view';
        $data['tahiry'] = $this->home_model->voirTahiry();
        $this->load->view('templates/main_view', $data);
        
    }    
    public function pageAjoutDepense()
    {     
        $data['main'] = 'ajout_depense_view';
        $this->load->view('templates/main_view', $data);
        
    }   
    public function ajoutSortie()
    {     
        $montant=$this->input->post('montant');
        $motif=$this->input->post('motif');
        $this->home_model->ajoutSortie($montant,$motif);
        redirect('home/pageTahiry');
        
    } 
      public function SupprimerMivoaka($id_vola_mivoaka,$days_in_month,$month,$years)
    {     
        
        $this->home_model->supmivoaka($id_vola_mivoaka);
        redirect('home/pageDepenseTotal/'. $days_in_month . '/' . $years . '/' . $month);
        
    }    

    public function PageModifierTypeM($id_type_mivoaka,$days_in_month,$month,$years)
    {     
        $data['main'] = 'modif_type_depense_view';
        $this->session->set_userdata('id', $id_type_mivoaka);
        $this->load->view('templates/main_view', $data);
        
    } 
    public function modifTypeDepense()
    {     
        $id_type_mivoaka=$this->session->userdata('id');
        $days_in_month=$this->session->userdata('days_in_month');
        $month=$this->session->userdata('month');
        $years=$this->session->userdata('years');
        $prix_unitaire=$this->input->post('prix_unitaire');
        $this->home_model->modifTypeDepense($id_type_mivoaka,$prix_unitaire);
        redirect('home/pageDepenseTotal/'. $days_in_month . '/' . $years . '/' . $month);
        
    } 
     public function pageDepenseEtTotal($days_in_month, $month, $years)
    {     
        $data['main'] = 'depense_totals_view';
        $days_in_month=$this->session->userdata('days_in_month');
        $month= $this->session->userdata('month');
        $years = $this->session->userdata('years');
        $data['payer'] = $this->session->userdata('payer');
        $data['total'] = $this->session->userdata('total');
        $data['depense'] = $this->home_model->voirDepenseTotal($days_in_month, $month, $years);
        $this->load->view('templates/main_view', $data);
        
    } 
    public function depenseMois()
    {     
        $data['main'] = 'depense_mois_view';
        $this->load->view('templates/main_view', $data);
        
    } 
    public function voirDepenseMois()
    {
        $mois = $this->input->post('mois');
        $annee = $this->input->post('annee');
        $data['depense'] = $this->home_model->voirDepenseMois($mois, $annee);
        echo json_encode($data['depense']);  // Retourner les résultats sous forme de JSON
    }
    


    public function print() {
        // Charger les données du modèle
        $days_in_month=$this->session->userdata('days_in_month');
        $month= $this->session->userdata('month');
        $years = $this->session->userdata('years');
        $data['payer'] = $this->session->userdata('payer');
        $data['total'] = $this->session->userdata('total');
        $data['depense'] = $this->home_model->voirDepenseTotal($days_in_month, $month, $years);
        // Charger la vue avec les données
        $html = $this->load->view('depense_totals_view', $data, true);
        
        // Créer une instance de mPDF
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'margin_top' => 10,
            'margin_right' => 10,
            'margin_left' => 10,
            'margin_bottom' => 10,
        ]);

        // Ajouter le HTML à mPDF
        $mpdf->WriteHTML($html);

        // Générer et afficher le PDF
        $mpdf->Output();
    }
   

    
   

  

}
