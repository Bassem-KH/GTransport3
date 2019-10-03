<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace PPE\GeParcBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PPE\GeParcBundle\Entity\Parc;
use PPE\GeParcBundle\Form\ParcForm;
use Symfony\Component\HttpFoundation\Request;





/**
 * Description of VoitureController
 *
 * @author salim.benjemaa
 */
class ParcController extends Controller {
    //put your code here
    
     //**************************Ajout**************************************************
    public function addAction(){
        $parc=new Parc();
        $form=$this->createForm(ParcForm::class,$parc);
        
        $request=$this->container->get('request_stack')->getCurrentRequest();
        if($request->getMethod()=='POST'){
            $form->handleRequest($request);
            if($form->isValid()){
                
                $em= $this->container->get('doctrine')->getEntityManager();
                $em->persist($parc);
                $em->flush();
                return $this->redirect($this->generateUrl("PPE_list_parc"));
            }
        }
        
        $view='GeParcBundle:Parc:add.html.twig';
        return $this->render($view,array('Form'=>$form->createView()));
    }
    
   
     //********************************LISTer*************************************
   public function listparcAction(){
        $em=$this->container->get('doctrine')->getEntityManager();
        $parcs = $em->getRepository('GeParcBundle:Parc')->findAll();
        
        
        
            $view='GeParcBundle:Parc:list.html.twig';
        return $this->render($view,array('parcs'=>$parcs));  
    }
    
    
     public function deleteAction($id){
        $em=$this->container->get('doctrine')->getEntityManager();
        $parc=$em->getRepository('GeParcBundle:Parc')->find($id);
        
        $em->remove($parc);
        $em->flush();
        
        return $this->redirect($this->generateUrl("PPE_list_parc"));
        
    }
    public function editParcAction($id){
        $em = $this->container->get('doctrine')->getEntityManager();
        $parc=$em->getRepository('GeParcBundle:Parc')->find($id);
        
         $form=$this->container->get('form.factory')->create(new ParcForm(),$parc);
       
        $Request=$this->getRequest();
        if($Request->getMethod()=='POST'){
            
            $form->bind($Request);
            if($form->isValid()){
                $em=$this->container->get('doctrine')->getEntityManager();
                $em->persist($parc);
                $em->flush();
              return $this->redirect($this->generateUrl("PPE_list_parc"));
            }
        }
        
        $view='GeParcBundle:Parc:edit.html.twig';
        return $this->render($view,array('Form'=>$form->createView()));
        
    }
     public function rechercheAction(){
        $em=$this->container->get('doctrine')->getEntityManager();
        $parcs=$em->getRepository('GeParcBundle:Parc')->findAll();
        //DQL
        $request=$this->getRequest();
        if($request->getMethod()=="POST"){
            $search=$request->get('input_recherche');
            $query=$em->createQuery(
                    "SELECT m FROM GeParcBundle:Parc m WHERE m.Description LIKE '".$search."%' OR m.EspaceMax LIKE '".$search."%'OR m.Adresse LIKE '".$search."%'"
                    );
            $parcs=$query->getResult();
        }
        $view='GeParcBundle:Parc:Recherche.html.twig';
        return $this->render($view,array('parcs'=>$parcs));
    }
    

  
}
    

