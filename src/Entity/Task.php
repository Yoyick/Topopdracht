<?php
// src/Entity/Task.php
namespace App\Entity;

class Task {
    protected $task;

    public function getInput() {
        return $this->task;
    }

    public function setInput($task) {
        $this->task = $task;
    }
}
