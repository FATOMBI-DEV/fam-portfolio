<?php
//require_once __DIR__ . '/Experience.php';

class Education extends Experience {
    protected string $table = 'experiences';

    public function all(): array {
        return $this->byType('education');
    }
}