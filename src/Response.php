<?php

class Response {
    public function json($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function html($content, $status = 200) {
        http_response_code($status);
        header('Content-Type: text/html');
        echo $content;
    }

    public function ajax($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/x-www-form-urlencoded');
        echo http_build_query($data);
    }
}
