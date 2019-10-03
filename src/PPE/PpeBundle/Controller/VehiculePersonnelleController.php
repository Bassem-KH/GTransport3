<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace PPE\PpeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PPE\PpeBundle\Entity\VehiculePersennelle;
use PPE\PpeBundle\Form\VehiculePersonnelleForm;


class VehiculePersonnelleController extends Controller {
    //put your code here
    
    
     //**************************Ajout**************************************************
    public function addAction(){
        $vehicule=new VehiculePersennelle();
        $form=$this->createForm(VehiculePersonnelleForm::class,$vehicule);
        
       $Request=$this->container->get('request_stack')->getCurrentRequest();
        if($Request->getMethod()=='POST'){
             $form->handleRequest($Request);
            if($form->isValid()){
                
                $em= $this->getDoctrine()->getManager();
                $em->persist($vehicule);
                $em->flush();
           
              
            return $this->redirect($this->generateUrl("PPE_list_VehiculePersonnelle"));
         
              
        }}
        $view='PpeBundle:VehiculePersonnelle:add.html.twig';
        return $this->render($view,array('Form'=>$form->createView()));
            }
        
    
    
    
   
     //********************************LISTer*************************************
    public function listvehiculeAction(){
        $em= $this->getDoctrine()->getManager();
        $vehicules = $em->getRepository('PpeBundle:VehiculePersennelle')->findAll();
        
        
        
            $view='PpeBundle:VehiculePersonnelle:list.html.twig';
        return $this->render($view,array('vehicules'=>$vehicules));  
    }
    
    //********************************Suprimer*************************************
     public function deleteAction($id){
        $em= $this->getDoctrine()->getManager();
        $vehicule=$em->getRepository('PpeBundle:VehiculePersennelle')->find($id);
        
        $em->remove($vehicule);
        $em->flush();
        
        return $this->redirect($this->generateUrl("PPE_list_VehiculePersonnelle"));
        
    }
    
    //********************************Modifier*************************************
    public function editVAction($id){
        $em= $this->getDoctrine()->getManager();
        $vehicule=$em->getRepository('PpeBundle:VehiculePersennelle')->find($id);
        
         $form=$this->createForm(VehiculePersonnelleForm::class,$vehicule);
       
        $Request=$this->container->get('request_stack')->getCurrentRequest();
        if($Request->getMethod()=='POST'){
            
            $form->handleRequest($Request);
            if($form->isValid()){
                $em= $this->getDoctrine()->getManager();
                $em->persist($vehicule);
                $em->flush();
              return $this->redirect($this->generateUrl("PPE_list_VehiculePersonnelle"));
            }
        }
        
        $view='PpeBundle:VehiculePersonnelle:edit.html.twig';
        return $this->render($view,array('Form'=>$form->createView()));
        
    }
    
    //********************************Recherche*************************************
     public function rechercheAction(){
        $em= $this->getDoctrine()->getManager();
        $vehicules=$em->getRepository('PpeBundle:VehiculePersennelle')->findAll();
        //DQL
        $request=$this->container->get('request_stack')->getCurrentRequest();
        if($request->getMethod()=="POST"){
            $search=$request->get('input_recherche');
            $query=$em->createQuery(
                    "SELECT m FROM PpeBundle:VehiculePersennelle m WHERE m.Marque LIKE '".$search."%' OR m.Kilomtetrage LIKE '".$search."%' OR m.NumImmatricule LIKE '".$search."%'OR m.Modele LIKE '".$search."%'OR m.DateDachat LIKE '".$search."%'OR m.Carburant LIKE '".$search."%'OR m.EtatVehicule LIKE '".$search."%'OR m.PuissanceFiscale LIKE '".$search."%'OR m.PuissanceMecanique LIKE '".$search."%'OR m.Disponibilite LIKE '".$search."%'"
                    );
            $vehicules=$query->getResult();
        }
        $view='PpeBundle:VehiculePersonnelle:Recherche.html.twig';
        return $this->render($view,array('vehicules'=>$vehicules));
    }
    //********************************Vehicule Disponible*************************************
   
    public function vehiculeDAction(){
        $em= $this->getDoctrine()->getManager();
        
        //DQL
        
       
            
            $query=$em->createQuery(
                    "SELECT m FROM PpeBundle:VehiculePersennelle m WHERE m.Disponibilite = 'Disponible'"
                    );
            $vehicules=$query->getResult();
        
        $view='PpeBundle:VehiculePersonnelle:listD.html.twig';
        return $this->render($view,array('vehicules'=>$vehicules));
    }
   
    
  
    

  
}
    

