<?php
class Message extends Model {
    protected string $table = 'messages';

    public function create(array $d): bool {
        $s = $this->db->prepare("
            INSERT INTO messages (name, email, subject, message)
            VALUES (:n,:e,:s,:m)
        ");
        return $s->execute([
            ':n' => $d['name'], ':e' => $d['email'],
            ':s' => $d['subject'] ?? '', ':m' => $d['message'],
        ]);
    }

    public function markRead(int $id): bool {
        return $this->db->prepare("UPDATE messages SET is_read=1 WHERE id=?")->execute([$id]);
    }
}