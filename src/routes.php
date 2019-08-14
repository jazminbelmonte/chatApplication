<?php
use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->post('/', function (Request $request, Response $response) {
    // Sample log message
    $this->logger->info("tweet-away '/' POST route");
    $data = $request->getParsedBody();
    $usr = $data['user'];
    $msg = $data['usermsg'];
    /* @var $db PDO */
    $db = $this->get('db');
    $stmt = $db->prepare("INSERT INTO jazminbelmonte_feeds (user, message) VALUES (?, ?)");
    if ($stmt->execute([$usr, $msg]) === false) {
        $response->getBody()->write('ERROR: Saving '.$usr.' failed.');
        return $this->response->withStatus(500);
    }
    return $this->renderer->render($response, 'index.phtml');
});
$app->get('/', function (Request $request, Response $response) {
    // Sample log message
    $this->logger->info("tweet-away '/' GET route");
    // Render index view
    return $this->renderer->render($response, 'index.phtml');
});
$app->get('/feed', function (Request $req, Response $res) {
    $this->logger->info("tweet-away '/' POST route");
    /* @var $db PDO */
    $db = $this->get('db');
    $stmt = $db->prepare("SELECT user, message, created_at FROM jazminbelmonte_feeds");
    if ($stmt->execute() === false) {
        $res->getBody()->write('ERROR: unable to retrieve users.');
        return $res->withStatus(500);
    }
    $data = $stmt->fetchAll();

    //print_r($data['user']);
    return $res->withJson($data)->withStatus(200);
});