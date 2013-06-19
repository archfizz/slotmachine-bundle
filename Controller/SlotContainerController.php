<?php

namespace SlotMachine\SlotBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SlotMachine\SlotBundle\Entity\SlotContainer;
use SlotMachine\SlotBundle\Form\SlotContainerType;

/**
 * SlotContainer controller.
 *
 */
class SlotContainerController extends Controller
{

    /**
     * Lists all SlotContainer entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SlotMachineSlotBundle:SlotContainer')->findAll();

        return $this->render('SlotMachineSlotBundle:SlotContainer:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SlotContainer entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new SlotContainer();
        $form = $this->createForm(new SlotContainerType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('slotcontainer_show', array('id' => $entity->getId())));
        }

        return $this->render('SlotMachineSlotBundle:SlotContainer:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new SlotContainer entity.
     *
     */
    public function newAction()
    {
        $entity = new SlotContainer();
        $form   = $this->createForm(new SlotContainerType(), $entity);

        return $this->render('SlotMachineSlotBundle:SlotContainer:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SlotContainer entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:SlotContainer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SlotContainer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SlotMachineSlotBundle:SlotContainer:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SlotContainer entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:SlotContainer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SlotContainer entity.');
        }

        $editForm = $this->createForm(new SlotContainerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SlotMachineSlotBundle:SlotContainer:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing SlotContainer entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:SlotContainer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SlotContainer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SlotContainerType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('slotcontainer_edit', array('id' => $id)));
        }

        return $this->render('SlotMachineSlotBundle:SlotContainer:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SlotContainer entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SlotMachineSlotBundle:SlotContainer')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SlotContainer entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('slotcontainer'));
    }

    /**
     * Creates a form to delete a SlotContainer entity by id.
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
