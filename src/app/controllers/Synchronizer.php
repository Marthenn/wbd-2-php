<?php

class Synchronizer extends Controller {
    // has on index method since it has no page
    public function index(){
        $data['title'] = '404 Not Found';
        $this->view('templates/header', $data);
        $this->view('not_found/index');
        $this->view('templates/footer');
    }

    public function synchronizeBook(){
        try{
            switch($_SERVER['REQUEST_METHOD']){
                case 'POST':
                    $key = $_POST['key'];
                    if ($key !== PHP_KEY){
                        throw new Exception('Unauthorized', 401);
                    }

                    $bookModel = $this->model('Book_model');
                    $res = $bookModel->getAllBooks($key);
                    if (!$res){
                        header('Content-Type: application/json');
                        http_response_code(200);
                        $responseData = [
                            'books' => [],
                        ];
                    } else {
                        http_response_code(200);
                        header('Content-Type: application/json');
                        $responseData = [
                            'books' => $res,
                        ];
                    }
                    echo json_encode($responseData);
                    exit;
                default:
                    throw new Exception('Invalid request method', 405);
            }
        } catch (Exception $e){
            http_response_code(500);
            header('Content-Type: application/json');
            $responseData = [
                'message' => $e->getMessage(),
            ];
            echo json_encode($responseData);
        }
    }

    public function getCategory(){
        try {
            switch($_SERVER['REQUEST_METHOD']){
                case 'POST':
                    $id = $_POST['id'];
                    $key = $_POST['key'];
                    if ($key !== PHP_KEY){
                        throw new Exception('Unauthorized', 401);
                    }

                    $BookModel = $this->model('Book_model');
                    $res = $BookModel->getCategory($id, $key);
                    if (!$res){
                        header('Content-Type: application/json');
                        http_response_code(200);
                        $responseData = [
                            'category' => [],
                        ];
                    } else {
                        http_response_code(200);
                        header('Content-Type: application/json');
                        $responseData = [
                            'category' => $res,
                        ];
                    }
                    echo json_encode($responseData);
                    exit;
                default:
                    throw new Exception('Invalid request method', 405);
            }
        } catch (Exception $e){
            http_response_code(500);
            header('Content-Type: application/json');
            $responseData = [
                'message' => $e->getMessage(),
            ];
            echo json_encode($responseData);
        }
    }

    public function getAuthor(){
        try {
            switch($_SERVER['REQUEST_METHOD']){
                case 'POST':
                    $id = $_POST['id'];
                    $key = $_POST['key'];
                    if ($key !== PHP_KEY){
                        throw new Exception('Unauthorized', 401);
                    }

                    $AuthorModel = $this->model('Author_model');
                    $res = $AuthorModel->getAuthor($id);
                    if (!$res){
                        header('Content-Type: application/json');
                        http_response_code(200);
                        $responseData = [
                            'author' => [],
                        ];
                    } else {
                        http_response_code(200);
                        header('Content-Type: application/json');
                        $responseData = [
                            'author' => $res,
                        ];
                    }
                    echo json_encode($responseData);
                    exit;
                default:
                    throw new Exception('Invalid request method', 405);
            }
        } catch (Exception $e){
            http_response_code(500);
            header('Content-Type: application/json');
            $responseData = [
                'message' => $e->getMessage(),
            ];
            echo json_encode($responseData);
        }
    }
}