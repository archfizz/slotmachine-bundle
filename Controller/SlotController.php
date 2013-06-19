<?php

namespace SlotMachine\SlotBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SlotMachine\SlotBundle\Entity\Slot;
use SlotMachine\SlotBundle\Form\SlotType;

/**
 * Slot controller.
 *
 */
class SlotController extends Controller
{

    /**
     * Lists all Slot entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SlotMachineSlotBundle:Slot')->findAll();

        return $this->render('SlotMachineSlotBundle:Slot:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Slot entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Slot();
        $form = $this->createForm(new SlotType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('slot_show', array('id' => $entity->getId())));
        }

        return $this->render('SlotMachineSlotBundle:Slot:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Slot entity.
     *
     */
    public function newAction()
    {
        $entity = new Slot();
        $form   = $this->createForm(new SlotType(), $entity);

        return $this->render('SlotMachineSlotBundle:Slot:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Slot entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:Slot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SlotMachineSlotBundle:Slot:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Slot entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:Slot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slot entity.');
        }

        $editForm = $this->createForm(new SlotType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SlotMachineSlotBundle:Slot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Slot entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:Slot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SlotType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('slot_edit', array('id' => $id)));
        }

        return $this->render('SlotMachineSlotBundle:Slot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Slot entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SlotMachineSlotBundle:Slot')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Slot entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('slot'));
    }

    /**
     * Creates a form to delete a Slot entity by id.
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
