<?php
class Skill extends Model {
    protected string $table = 'skills';

    public function grouped(): array {
        $rows = $this->findAll('category ASC, sort_order ASC');
        $out = [];
        foreach ($rows as $r) $out[$r['category']][] = $r;
        return $out;
    }
}