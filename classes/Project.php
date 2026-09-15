<?php
class Project extends Model {
    protected string $table = 'projects';

    public function create(array $d): bool {
        // static data; creation not supported
        return false;
    }

    public function featured(): array {
        $rows = $this->findAll();
        return array_values(array_filter($rows, function($r){ return !empty($r['featured']); }));
    }

    public function byCategory(string $cat): array {
        $rows = $this->findAll();
        return array_values(array_filter($rows, function($r) use ($cat){ return ($r['category'] ?? '') === $cat; }));
    }
}