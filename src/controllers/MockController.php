<?php

namespace Controllers;

class MockController {

    public function __call($name, $arguments) {
        return $this->_getMockResult($name);
    }

    /**
     * @param string $file
     * @return array
     */
    protected function _getMockResult(string $file) {
        $result = file_get_contents("mocks/sources/{$file}.json");

        if ($result === false) {
            return ['error' => "Mock file '{$file}.json' for this action does not exist"];
        }

        return json_decode($result, true);
    }
}