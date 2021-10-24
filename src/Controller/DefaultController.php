<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use App\Model\Bird;

class DefaultController extends AbstractController
{
    /**
     * Méthode affichant un message d'espoir : Hello world
     *
     * @Route("/", name="bird_index", methods={"POST", "GET"})
     * @return Response
     */
    public function index(SessionInterface $session) : Response
    {
        //On va récuperer la liste de tous les oiseaux depuis le model Bird
        $birdModel = new Bird();
        $birds= $birdModel->getBirds();

        $birdLast = $session->get('bird_last_seen');

        dump($birds, $birdLast);

        return $this->render('default/index.html.twig', [
            'birds' => $birds,
            'birdLast' => $birdLast
        ]);
    }

    /**
     * Méthode affichant un message d'espoir pour des oiseaux bien énervés
     *
     * @Route("/bird/{id}", name="bird_show", methods={"GET"})
     * @return Response
     */
    public function bird($id, SessionInterface $session) : Response
    {
        $birdModel = new Bird();
        $bird = $birdModel->getBirdById($id);

        // A chaque fois que l'on affiche un oiseau, on veut se rappeler des 
        // informations qui lui sont associées. On affichera ensuite ces infos 
        // en page d'accueil.
        // Pour intéragir avec la session php, on peut utiliser le service Session
        // de Symfony en faisant une INJECTION DE DEPENDANCE (SessionInterface)
        $session->set('bird_last_seen', $bird);

        return $this->render('default/bird.html.twig', [
            'bird' => $bird
        ]);
    }

    /**
     * Permet le téléchargmement du calendrier Andry bird
     *
     * @Route("/download_pdf", name="bird_download", methods={"GET"})
     * @return Response
     */
    public function download() : Response
    {
        // Pré-traitement : vérifiaction de l'identité avant téléchargment,...

        // On appelle la méthode file de l'AbstractController, qui va nous permettre
        // de télécharger notre fichier
        return $this->file('assets/files/angry_birds_2015_calendar.pdf');
    }

}