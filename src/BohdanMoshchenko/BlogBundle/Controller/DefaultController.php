<?php

namespace BohdanMoshchenko\BlogBundle\Controller;

use BohdanMoshchenko\BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BohdanMoshchenkoBlogBundle:Default:index.html.twig');
    }

    public function postAction(Request $request)
    {
        $post = new Post();

        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class)
            ->add('text', TextareaType::class)
            ->add('save', SubmitType::class, [
                'label' => 'Create Post',
            ])
            ->getForm()
        ;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setCreatedAt(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
        }

        return $this->render('@BohdanMoshchenkoBlog/Default/post.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
