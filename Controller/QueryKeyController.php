<?php

namespace SlotMachine\SlotBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SlotMachine\SlotBundle\Entity\QueryKey;
use SlotMachine\SlotBundle\Form\QueryKeyType;

/**
 * QueryKey controller.
 *
 */
class QueryKeyController extends Controller
{

    /**
     * Lists all QueryKey entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SlotMachineSlotBundle:QueryKey')->findAll();

        return $this->render('SlotMachineSlotBundle:QueryKey:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new QueryKey entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new QueryKey();
        $form = $this->createForm(new QueryKeyType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('querykey_show', array('id' => $entity->getId())));
        }

        return $this->render('SlotMachineSlotBundle:QueryKey:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new QueryKey entity.
     *
     */
    public function newAction()
    {
        $entity = new QueryKey();
        $form   = $this->createForm(new QueryKeyType(), $entity);

        return $this->render('SlotMachineSlotBundle:QueryKey:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a QueryKey entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:QueryKey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QueryKey entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SlotMachineSlotBundle:QueryKey:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing QueryKey entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:QueryKey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QueryKey entity.');
        }

        $editForm = $this->createForm(new QueryKeyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SlotMachineSlotBundle:QueryKey:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing QueryKey entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlotMachineSlotBundle:QueryKey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QueryKey entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new QueryKeyType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('querykey_edit', array('id' => $id)));
        }

        return $this->render('SlotMachineSlotBundle:QueryKey:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a QueryKey entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SlotMachineSlotBundle:QueryKey')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find QueryKey entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('querykey'));
    }

    /**
     * Creates a form to delete a QueryKey entity by id.
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
