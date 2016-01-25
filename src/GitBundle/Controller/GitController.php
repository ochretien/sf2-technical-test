<?php

namespace GitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GitBundle\Entity\Git;
use GitBundle\Form\GitType;

/**
 * Git controller.
 *
 * @Route("/git")
 */
class GitController extends Controller
{

    /**
     * Lists all Git entities.
     *
     * @Route("/", name="git_index")
     * @Method("GET")
     * @Template("Git/index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GitBundle:Git')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Git entity.
     *
     * @Route("/", name="git_create")
     * @Method("POST")
     * @Template("Git/new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Git();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('git_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Git entity.
     *
     * @param Git $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Git $entity)
    {
        $form = $this->createForm(new GitType(), $entity, array(
            'action' => $this->generateUrl('git_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Git entity.
     *
     * @Route("/new", name="git_new")
     * @Method("GET")
     * @Template("Git/new.html.twig")
     */
    public function newAction()
    {
        $entity = new Git();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Git entity.
     *
     * @Route("/{id}", name="git_show")
     * @Method("GET")
     * @Template("Git/show.html.twig")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GitBundle:Git')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Git entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Git entity.
     *
     * @Route("/{id}/edit", name="git_edit")
     * @Method("GET")
     * @Template("Git/edit.html.twig")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GitBundle:Git')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Git entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Git entity.
    *
    * @param Git $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Git $entity)
    {
        $form = $this->createForm(new GitType(), $entity, array(
            'action' => $this->generateUrl('git_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Git entity.
     *
     * @Route("/{id}", name="git_update")
     * @Method("PUT")
     * @Template(""Git/edit.html.twig"")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GitBundle:Git')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Git entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('git_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Git entity.
     *
     * @Route("/{id}", name="git_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GitBundle:Git')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Git entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('git_index'));
    }

    /**
     * Creates a form to delete a Git entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
