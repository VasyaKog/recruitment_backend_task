<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\DateType;
use Domain\Date\DateManager;
use Domain\Date\Dto\InputDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DateController extends AbstractController
{
    private DateManager $dateManager;

    public function __construct(
        DateManager $dateManager
    ) {
        $this->dateManager = $dateManager;
    }

    /**
     * @Route("/date", name="app_date_index")
     */
    public function index(
        Request $request
    ): Response {
        $inputDto = new InputDto();

        $form = $this
            ->createForm(
                DateType::class,
                $inputDto,
            )
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $inputDto = $form->getData();

           $resultDto = $this
               ->dateManager
               ->process($inputDto)
           ;

            return $this
                ->render(
                    'date/result.html.twig',
                    [
                        'input' => $inputDto,
                        'result' => $resultDto,
                    ],
                )
            ;
        }

        return $this
            ->render(
                'date/index.html.twig',
                [
                    'form' => $form->createView(),
                ],
            )
        ;
    }
}