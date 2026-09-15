<?php
abstract class Model {
    protected array $data;
    protected string $table;

    public function __construct() {
        static $loaded = false;
        if (!$loaded) {
            $path = __DIR__ . '/../data/portfolio_data.php';
            if (file_exists($path)) {
                $d = require $path;
                $this->data = $d;
            } else {
                $this->data = [];
            }
            $loaded = true;
        } else {
            // subsequent instances can still access the data file
            $d = require __DIR__ . '/../data/portfolio_data.php';
            $this->data = $d;
        }
    }

    public function findAll(string $order = ''): array {
        $rows = $this->data[$this->table] ?? [];
        return $rows;
    }

    public function findById(int $id): ?array {
        $rows = $this->data[$this->table] ?? [];
        foreach ($rows as $r) {
            if (isset($r['id']) && (int)$r['id'] === $id) return $r;
        }
        return null;
    }

    public function delete(int $id): bool {
        // write operations are not supported for static data
        return false;
    }

    public function count(): int {
        $rows = $this->data[$this->table] ?? [];
        return count($rows);
    }
}