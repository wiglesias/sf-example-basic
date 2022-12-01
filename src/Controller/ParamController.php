<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/params')]
class ParamController extends AbstractController
{
	#[Route('/query', name: 'get-query-aram', methods: ['GET'])]
	public function getQueryParams(Request $request): Response
	{
		$name = $request->query->get('name');
		$email = $request->query->get('email');

		return $this->render('param/params.html.twig', [
			'name' => $name,
			'email' => $email
		]);
//		return new JsonResponse([
//			'name' => $name,
//			'email' => $email
//		]);
	}

	#[Route('/attributes/{name}/{email}', name: 'get-from-attributes', methods: ['GET'])]
	public function getFromAttributes(string $name, string $email): Response
	{
		// Normal approach
//		$name = $request->attributes->get('name');
//		$email = $request->attributes->get('email');

		// Recommended approach
		// public function getFromAttributes(string $name, string $email): Response

		return new JsonResponse([
			'name' => $name,
			'email' => $email
		]);
	}

	#[Route('/body', name: 'get-from-body', methods: ['POST'])]
	public function getFromBody(Request $request): Response
	{
		$request->request = new ParameterBag(json_decode($request->getContent(), true));

		return new JsonResponse([
			'name' => $request->request->get('name'),
			'email' => $request->request->get('email')
		]);
	}
}
