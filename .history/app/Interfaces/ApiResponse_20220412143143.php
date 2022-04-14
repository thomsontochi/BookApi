<?php 











public function respondWithError($message)
    {
        return $this->respond([
            'error' => $message
        ]);

    }