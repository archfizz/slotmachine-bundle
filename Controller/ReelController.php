<?php

namespace SlotMachine\SlotBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SlotMachine\SlotBundle\Entity\Reel;
use SlotMachine\SlotBundle\Form\ReelType;

/**
 * Reel controller.
 *
 */
class ReelController extends Controller
{

    /**
     * Lists all Reel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SlotMachineSlotBundle:Reel')->findAll();

        return $this->render('SlotMachineSlotBundle:Reel:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Reel entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Reel();
        $form = $this->createForm(new ReelType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reel_show', array('id' => $entity->getId())));
        }

        return $this->render('SlotMachineSlotBundle:Reel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Reel entity.
     *
     */
    public function newAction()
    {
        $entity = new Reel();
        $form   = $this->createForm(new ReelType(), $entity);

        return $this->render('SlotMachineSlotBundle:Reel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Reel entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:Reel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SlotMachineSlotBundle:Reel:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reel entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:Reel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reel entity.');
        }

        $editForm = $this->createForm(new ReelType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SlotMachineSlotBundle:Reel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Reel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:Reel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ReelType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reel_edit', array('id' => $id)));
        }

        return $this->render('SlotMachineSlotBundle:Reel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Reel entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SlotMachineSlotBundle:Reel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reel'));
    }

    /**
     * Creates a form to delete a Reel entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
