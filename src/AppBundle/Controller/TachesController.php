<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Taches;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tach controller.
 *
 * @Route("/{_locale}/taches")
 */
class TachesController extends Controller
{
    /**
     * Lists all tach entities.
     *
     * @Route("/", name="taches_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $taches = $em->getRepository('AppBundle:Taches')->findAll();

        return $this->render('taches/index.html.twig', array(
            'taches' => $taches,
        ));
    }

    /**
     * Creates a new tach entity.
     *
     * @Route("/new", name="taches_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tach = new Taches();
        $form = $this->createForm('AppBundle\Form\TachesType', $tach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tach);
            $em->flush();

            return $this->redirectToRoute('taches_show', array('id' => $tach->getId()));
        }

        return $this->render('taches/new.html.twig', array(
            'tach' => $tach,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tach entity.
     *
     * @Route("/{id}", name="taches_show")
     * @Method("GET")
     */
    public function showAction(Taches $tach)
    {
        $deleteForm = $this->createDeleteForm($tach);

        return $this->render('taches/show.html.twig', array(
            'tach' => $tach,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tach entity.
     *
     * @Route("/{id}/edit", name="taches_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Taches $tach)
    {
        $deleteForm = $this->createDeleteForm($tach);
        $editForm = $this->createForm('AppBundle\Form\TachesType', $tach);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('taches_edit', array('id' => $tach->getId()));
        }

        return $this->render('taches/edit.html.twig', array(
            'tach' => $tach,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tach entity.
     *
     * @Route("/{id}/delete", name="taches_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Taches $tach)
    {
        $form = $this->createDeleteForm($tach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tach);
            $em->flush();
        }

        return $this->redirectToRoute('taches_index');
    }

    /**
     * Creates a form to delete a tach entity.
     *
     * @param Taches $tach The tach entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Taches $tach)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('taches_delete', array('id' => $tach->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
