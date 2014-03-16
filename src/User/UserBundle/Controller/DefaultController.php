<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use User\UserBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
    $userRepo=$this->getDoctrine()->getRepository('UserUserBundle:User');
    $user=$userRepo->findAll();
    return $this->render('UserUserBundle:Default:index.html.twig', array('users' => $user));

    }
    public function deleteAction(User $user)
    {
        $userRepo=$this->getDoctrine()->getRepository('UserUserBundle:User');
//        $user=$userRepo->delete($id);
//        return $this->render('UserUserBundle:Default:index.html.twig', array('users' => $user));
        if (!$user)
        {
            throw $this->createNotFoundException();

        }
        $em=$this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirect($this->generateUrl('user_user_homepage'));
    }
    public function createAction(Request $request)
    {
        $user=new User();
        $form=$this->createFormBuilder($user)
            ->add('name','text')
            ->add('lastName','text')
            ->add('age','number')
            ->add('Create','submit')
            ->getForm();
        $form->handleRequest($request);
        $form->createView();
        if ($form->isSubmitted())
        {
            if($form->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                return $this->redirect($this->generateUrl('user_user_homepage'));

            }
        }
        return $this->render('UserUserBundle:Default:create.html.twig',array('form'=>$form->createView()));
    }
}
