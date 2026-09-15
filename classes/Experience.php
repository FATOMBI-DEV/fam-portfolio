<?php
require_once __DIR__ . '/Model.php';
class Experience extends Model {
    protected string $table = 'experiences';

    public function byType(string $type): array {
        $rows = $this->findAll();
        $out = array_values(array_filter($rows, function($r) use ($type){ return ($r['type'] ?? '') === $type; }));
        // sort by start_date desc
        usort($out, function($a,$b){ return strcmp($b['start_date'] ?? '', $a['start_date'] ?? ''); });
        return $out;
    }
}