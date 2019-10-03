<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace PPE\PpeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PPE\PpeBundle\Entity\VehiculeTransport;
use PPE\PpeBundle\Form\VehiculeTransportForm;



class VehiculeDeTransportController extends Controller {
    //put your code here
    
    
     //**************************Ajout**************************************************
    public function addAction(){
        $vehicule=new VehiculeTransport();
        $form=$this->createForm(VehiculeTransportForm::class,$vehicule);
        
       $Request=$this->container->get('request_stack')->getCurrentRequest();
        if($Request->getMethod()=='POST'){
             $form->handleRequest($Request);
            if($form->isValid()){
                
                $em= $this->getDoctrine()->getManager();
                $em->persist($vehicule);
                $em->flush();
           
              
            return $this->redirect($this->generateUrl("PPE_list_VehiculeTransport"));
         
              
        }}
        $view='PpeBundle:Vehicule:add.html.twig';
        return $this->render($view,array('Form'=>$form->createView()));
            }
        
    
    
    
   
     //********************************LISTer*************************************
    public function listvehiculeAction(){
        $em= $this->getDoctrine()->getManager();
        $vehicules = $em->getRepository('PpeBundle:VehiculeTransport')->findAll();
        
        
        
            $view='PpeBundle:Vehicule:list.html.twig';
        return $this->render($view,array('vehicules'=>$vehicules));  
    }
     public function deleteAction($id){
        $em= $this->getDoctrine()->getManager();
        $vehicule=$em->getRepository('PpeBundle:VehiculeTransport')->find($id);
        
        $em->remove($vehicule);
        $em->flush();
        
        return $this->redirect($this->generateUrl("PPE_list_VehiculeTransport"));
        
    }
    public function editVAction($id){
        $em= $this->getDoctrine()->getManager();
        $vehicule=$em->getRepository('PpeBundle:VehiculeTransport')->find($id);
        
         $form=$this->createForm(VehiculeTransportForm::class,$vehicule);
       
        $Request=$this->container->get('request_stack')->getCurrentRequest();
        if($Request->getMethod()=='POST'){
            
            $form->handleRequest($Request);
            if($form->isValid()){
                $em= $this->getDoctrine()->getManager();
                $em->persist($vehicule);
                $em->flush();
              return $this->redirect($this->generateUrl("PPE_list_VehiculeTransport"));
            }
        }
        
        $view='PpeBundle:Vehicule:edit.html.twig';
        return $this->render($view,array('Form'=>$form->createView()));
        
    }
     public function rechercheAction(){
        $em= $this->getDoctrine()->getManager();
        $vehicules=$em->getRepository('PpeBundle:VehiculeTransport')->findAll();
        //DQL
        $request=$this->container->get('request_stack')->getCurrentRequest();
        if($request->getMethod()=="POST"){
            $search=$request->get('input_recherche');
            $query=$em->createQuery(
                    "SELECT m FROM PpeBundle:VehiculeTransport m WHERE m.Marque LIKE '".$search."%' OR m.Kilomtetrage LIKE '".$search."%' OR m.NumImmatricule LIKE '".$search."%'OR m.Modele LIKE '".$search."%'OR m.DateDachat LIKE '".$search."%'OR m.Carburant LIKE '".$search."%'OR m.EtatVehicule LIKE '".$search."%'OR m.PuissanceFiscale LIKE '".$search."%'OR m.PuissanceMecanique LIKE '".$search."%'OR m.Disponibilite LIKE '".$search."%'"
                    );
            $vehicules=$query->getResult();
        }
        $view='PpeBundle:Vehicule:Recherche.html.twig';
        return $this->render($view,array('vehicules'=>$vehicules));
    }
    
    /***************Vehicule Disponible ************/
    public function vehiculeDAction(){
        $em= $this->getDoctrine()->getManager();
        
        //DQL
        
       
            
            $query=$em->createQuery(
                    "SELECT m FROM PpeBundle:VehiculeTransport m WHERE m.Disponibilite = 'Disponible'"
                    );
            $vehicules=$query->getResult();
        
        $view='PpeBundle:Vehicule:listD.html.twig';
        return $this->render($view,array('vehicules'=>$vehicules));
    }
   
    
  
    

  
}
    

