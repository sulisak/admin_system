<?php
class VisitingController extends Controller
{
    function cards()
    {
        try {
            // Allow cross origin request
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Headers: *");
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
            header("Content-Type: application/json; charset=UTF-8");

            // Checking request method if POST, create a new card
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get request body
                $body = json_decode(file_get_contents("php://input"), true);
                // Checking if request body is not empty
                if (empty($body)) {
                    echo $this->getApiResponse(null, false, 'Request body is empty!');
                    return;
                }
                // Checking if request body has cardNo or not 
                if (!isset($body['cardNo'])) {
                    echo $this->getApiResponse(null, false, 'Card number is required!');
                    return;
                }
                $visitCardModel = $this->loadModel('VisitCardModel');

                // Checking is cardNo duplicate or not
                $card = $visitCardModel->getCardByCardNo($body['cardNo']);
                if ($card) {
                    echo $this->getApiResponse(null, false, 'Card number is duplicate!');
                    return;
                }

                // Create a new card
                $visitCardModel->create($body['cardNo'], $body['cardType']);
                echo $this->getApiResponse($body, true, 'Success!');
                return;
            } else if (
                /**
                 * Handling GET request
                 */
                $_SERVER['REQUEST_METHOD'] == 'GET'
            ) {
                // Handle get all cards
                if (isset($_GET['q']) && $_GET['q'] == 'all') {
                    $visitCardModel = $this->loadModel('VisitCardModel');
                    $cards = $visitCardModel->getAllCardsNoLimit();
                    echo $this->getApiResponse($cards, true, 'Success!');
                    return;
                }

                $recordsPerPage = 20;
                if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                    $currentPage = $_GET['page'];
                } else {
                    $currentPage = 1; // default to the first page
                }
                // Calculate the offset
                $offset = ($currentPage - 1) * $recordsPerPage;

                // Checking if query with cardNo or not if yes, get card by cardNo
                $cardNo = isset($_GET['no']) ? $_GET['no'] : null;
                if ($cardNo) {
                    // Get card by cardNo
                    $visitCardModel = $this->loadModel('VisitCardModel');
                    $card = $visitCardModel->getCardByCardNo($cardNo);
                    if (!$card) {
                        echo $this->getApiResponse(null, false, 'Card not found!');
                        return;
                    }
                    echo $this->getApiResponse($card, true, 'Success!');
                    return;
                }

                // Get all cards with pagination params
                $visitCardModel = $this->loadModel('VisitCardModel');
                $cards = $visitCardModel->getAllCards(
                    $offset,
                    $recordsPerPage
                );
                $totalRecords = $visitCardModel->getTotalRecords();
                echo $this->getPaginationApiResponse(
                    $cards,
                    true,
                    'Success!',
                    $currentPage,
                    $recordsPerPage,
                    count($cards),
                    ceil($totalRecords / $recordsPerPage),
                    $totalRecords,
                );
                return;
            } else if (
                // Handling PUT request to active or inactive the card
                $_SERVER['REQUEST_METHOD'] == 'PUT'
            ) {
                // Get request body
                $body = json_decode(file_get_contents("php://input"), true);
                // Checking if request body is not empty
                if (empty($body)) {
                    echo $this->getApiResponse(null, false, 'Request body is empty!');
                    return;
                }
                // The body should contains status 
                $status = isset($body['status']) ? $body['status'] : null;
                if (!$status) {
                    echo $this->getApiResponse(null, false, 'Status is required!');
                    return;
                }

                // Get card number from request body;
                $cardNo = isset($body['cardNo']) ? $body['cardNo'] : null;
                if (!$cardNo) {
                    echo $this->getApiResponse(null, false, 'Card number is required!');
                    return;
                }

                $visitCardModel = $this->loadModel('VisitCardModel');
                // Get card by cardNo
                $card = $visitCardModel->getCardByCardNo($cardNo);
                if (!$card) {
                    echo $this->getApiResponse(null, false, 'Card not found!');
                    return;
                }

                // Validate is the card still in visiting or not
                $visitingModel = $this->loadModel('OfficeVisitingModel');
                $cardActive = $visitingModel->getActiveVisitingByCard($card->id);
                if ($cardActive) {
                    echo $this->getApiResponse(null, false, 'Card is still in visiting!');
                    return;
                }

                // Update card status
                $result = $visitCardModel->updateCardStatus($cardNo, $status == 'active' ? 1 : 0);
                echo $this->getApiResponse($result, true, 'Success!');
                return;
            }
            // else if (
            //     // Handling DELETE request to delete card
            //     $_SERVER['REQUEST_METHOD'] == 'DELETE'
            // ) {
            //     // Get request body
            //     $body = json_decode(file_get_contents("php://input"), true);
            //     // Checking if request body is not empty
            //     if (empty($body)) {
            //         echo $this->getApiResponse(null, false, 'Request body is empty!');
            //         return;
            //     }
            //     // Checking if request body has cardNo or not 
            //     if (!isset($body['cardNo'])) {
            //         echo $this->getApiResponse(null, false, 'Card number is required!');
            //         return;
            //     }
            //     $visitCardModel = $this->loadModel('VisitCardModel');

            //     // Checking is cardNo duplicate or not
            //     $card = $visitCardModel->getCardByCardNo($body['cardNo']);
            //     if (!$card) {
            //         echo $this->getApiResponse(null, false, 'Card not found!');
            //         return;
            //     }

            //     // Delete card
            //     $visitCardModel->delete($body['cardNo']);
            //     echo $this->getApiResponse($body, true, 'Success!');
            //     return;
            // }

            echo $this->getApiResponse(null, false, 'Something went wrong!');
        } catch (Exception $e) {
            echo $this->getApiResponse(null, false, $e->getMessage());
            return;
        }
    }

    function visiting()
    {
        // Allow cross origin request
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Content-Type: application/json; charset=UTF-8");


        /**
         * Handle POST request to create a new visiting
         */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get request body
            $body = json_decode(file_get_contents("php://input"), true);
            // Checking if request body is not empty
            if (empty($body)) {
                echo $this->getApiResponse(null, false, 'Request body is empty!');
                return;
            }
            // Validate required fields
            $requiredFields = [
                'visitorName',
                'comeFrom',
                'visitingCardId',
            ];
            foreach ($requiredFields as $field) {
                if (!isset($body[$field])) {
                    echo $this->getApiResponse(null, false, $field . ' is required!');
                    return;
                }
            }
            // Validate is visiting card is valid exist or not
            $visitCardModel = $this->loadModel('VisitCardModel');
            $card = $visitCardModel->getCardById($body['visitingCardId']);
            if (!$card) {
                echo $this->getApiResponse(null, false, 'Visiting card not found!');
                return;
            }

            $visitingModel = $this->loadModel('OfficeVisitingModel');
            // Validate is visiting card is active or not
            $cardActive = $visitingModel->getActiveVisitingByCard($body['visitingCardId']);
            if ($cardActive) {
                echo $this->getApiResponse(null, false, 'Visiting card already in use in another visiting!');
                return;
            }

            $result = $visitingModel->create(
                $body['visitorName'],
                $body['comeFrom'],
                $body['objective'],
                $body['officeFloor'],
                $body['idType'],
                $body['idNo'],
                $body['phone'],
                $body['totalVisitor'],
                $body['visitingCardId'],
            );

            echo $this->getApiResponse($result, true, 'Success!');
            return;
        }
        /**
         * Handle GET method to get all visitings
         */
        else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Handle search visiting by card and visitor name
            if (isset($_GET['search'])) {
                $visitingModel = $this->loadModel('OfficeVisitingModel');
                $visitings = $visitingModel->searyByCardOrName($_GET['search']);
                echo $this->getApiResponse($visitings, true, 'Success!');
                return;
            }

            $visitingModel = $this->loadModel('OfficeVisitingModel');
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $recordsPerPage = isset($_GET['limit']) ? $_GET['limit'] : 20;
            // Calculate the offset
            $offset = ($currentPage - 1) * $recordsPerPage;
            $visiting = $visitingModel->getAllVisiting($offset, $recordsPerPage);
            $totalRecords = $visitingModel->getTotalVisiting();
            $this->getPaginationApiResponse(
                $visiting,
                true,
                'Success!',
                $currentPage,
                $recordsPerPage,
                count($visiting),
                ceil($totalRecords / $recordsPerPage),
                $totalRecords,
            );
            return;
        }

        /**
         * Handle PUT request to clear visiting
         */
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            // Get request body
            $body = json_decode(file_get_contents("php://input"), true);
            // Checking if request body is not empty
            if (empty($body)) {
                echo $this->getApiResponse(null, false, 'Request body is empty!');
                return;
            }
            // Checking if request body has visitId or not 
            if (!isset($body['visitingId'])) {
                echo $this->getApiResponse(null, false, 'Visiting id is required!');
                return;
            }
            $visitingModel = $this->loadModel('OfficeVisitingModel');

            // Clear visiting
            $visitingModel->clearVisiting($body['visitingId']);
            echo $this->getApiResponse(null, true, 'Success!');
            return;
        }
        echo $this->getApiResponse(null, false, 'Something went wrong!');
    }

    private function getApiResponse($data, $isSuccess, $message)
    {
        $data = array(
            'success' => $isSuccess,
            'message' => $message,
            'data' => $data,
        );

        $responseData = json_encode($data, JSON_PRETTY_PRINT);
        header('Content-Type: application/json; charset=utf-8');
        echo $responseData;
    }

    private function getPaginationApiResponse(
        $data,
        $isSuccess,
        $message,
        $currentPage,
        $limit,
        $count,
        $totalPages,
        $totalRecords,
    ) {
        $data = array(
            'success' => $isSuccess,
            'message' => $message,
            'data' => $data,
            'pagination' => array(
                'currentPage' => $currentPage,
                'limit' => $limit,
                'count' => $count,
                'totalPages' => $totalPages,
                'totalRecords' => $totalRecords,
            ),
        );

        $responseData = json_encode($data, JSON_PRETTY_PRINT);
        header('Content-Type: application/json; charset=utf-8');
        echo $responseData;
    }
}
