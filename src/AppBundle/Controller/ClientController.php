<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use JMS\SecurityExtraBundle\Annotation\SecureParam;
use AppBundle\Entity\Client;
use AppBundle\Form\ClientType;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;

use Symfony\Component\HttpFoundation\Response;


/**
 * Client controller.
 *
 * @Route("/client")
 */
class ClientController extends Controller
{
    /**
     * Lists all Client entities.
     *
     * @Route("/", name="client_index")
     * @Method("GET")
	 * @Secure(roles="ROLE_DIRECTOR, ROLE_ADMIN")
     */
    public function indexAction(Request $request)
    {	
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('AppBundle:Client')->findAll();

        return $this->render('client/index.html.twig', array(
            'clients' => $clients,
        ));
    }


    /**
     * Creates a new Client entity.
     *
     * @Route("/new", name="client_new")
     * @Method({"GET", "POST"})
	 * @Secure(roles="ROLE_DIRECTOR, ROLE_ADMIN")
     */
    public function newAction(Request $request)
    {
        $client = new Client();
		$client->setIdUserAdd( $this->get('security.token_storage')->getToken()->getUser() );
        $form = $this->createForm('AppBundle\Form\ClientType', $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            // creating the ACL
            $aclProvider = $this->get('security.acl.provider');
            $objectIdentity = ObjectIdentity::fromDomainObject($client);
            $acl = $aclProvider->createAcl($objectIdentity);

            // retrieving the security identity of the currently logged-in user
            $tokenStorage = $this->get('security.token_storage');
            $user = $tokenStorage->getToken()->getUser();
            $securityIdentity = UserSecurityIdentity::fromAccount($user);

            // grant owner access
            $acl->insertObjectAce($securityIdentity, MaskBuilder::MASK_OWNER);
            $aclProvider->updateAcl($acl);

            return $this->redirectToRoute('client_show', array('id' => $client->getId()));
        }

        return $this->render('client/new.html.twig', array(
            'client' => $client,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Client entity.
     *
     * @Route("/{id}", name="client_show")
     * @Method("GET")
	 * @SecureParam(name="client", permissions="EDIT")
     */
    public function showAction(Client $client)
    {
        $deleteForm = $this->createDeleteForm($client);

        return $this->render('client/show.html.twig', array(
            'client' => $client,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Client entity.
     *
     * @Route("/{id}/edit", name="client_edit")
     * @Method({"GET", "POST"})
	 * @SecureParam(name="client", permissions="EDIT")
     */
    public function editAction(Request $request, Client $client)
    {
        $deleteForm = $this->createDeleteForm($client);
        $editForm = $this->createForm('AppBundle\Form\ClientType', $client);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_edit', array('id' => $client->getId()));
        }

        return $this->render('client/edit.html.twig', array(
            'client' => $client,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Client entity.
     *
     * @Route("/{id}", name="client_delete")
     * @Method("DELETE")
	 * @SecureParam(name="client", permissions="DELETE")
     */
    public function deleteAction(Request $request, Client $client)
    {
        $form = $this->createDeleteForm($client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($client);
            $em->flush();
        }

        return $this->redirectToRoute('client_index');
    }

    /**
     * Creates a form to delete a Client entity.
     *
     * @param Client $client The Client entity
     *
     * @return \Symfony\Component\Form\Form The form
	 * @SecureParam(name="client", permissions="DELETE")
     */
    private function createDeleteForm(Client $client)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('client_delete', array('id' => $client->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
