<?php
class Profile extends Model {
    protected string $table = 'profile';

    public function get(): ?array {
        $rows = $this->findAll();
        return $rows[0] ?? null;
    }

    public function update(array $d): bool {
        // static data; updates are not supported in this simplified version
        return false;
    }
}