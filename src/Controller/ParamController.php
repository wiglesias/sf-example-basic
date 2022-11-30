<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParamController
{
	#[Route('/query', name: 'get-query-aram', methods: ['GET'])]
	public function getQueryParams(Request $request): Response
	{
		$name = $request->query->get('name');
		$email = $request->query->get('email');

		return new JsonResponse([
			'name' => $name,
			'email' => $email
		]);
	}

	#[Route('/attributes/{name}/{email}', name: 'get-from-attributes', methods: ['GET'])]
	public function getFromAttributes(Request $request): Response
	{
		$name = $request->attributes->get('name');
		$email = $request->attributes->get('email');

		return new JsonResponse([
			'name' => $name,
			'email' => $email
		]);
	}
}
