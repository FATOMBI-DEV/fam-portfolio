<?php
class User extends Model {
    protected string $table = 'users';

    public function login(string $u, string $p): ?array {
        $s = $this->db->prepare("SELECT * FROM users WHERE username=? OR email=? LIMIT 1");
        $s->execute([$u, $u]);
        $user = $s->fetch();
        if ($user && password_verify($p, $user['password'])) {
            $this->db->prepare("UPDATE users SET last_login=NOW() WHERE id=?")
                     ->execute([$user['id']]);
            return $user;
        }
        return null;
    }

    /* ✅ Nouvelle méthode */
    public function exists(string $username, string $email): bool {
        $s = $this->db->prepare("SELECT id FROM users WHERE username=? OR email=? LIMIT 1");
        $s->execute([$username, $email]);
        return (bool) $s->fetch();
    }

    public function register(string $username, string $email, string $password): ?int {
        if ($this->exists($username, $email)) return null;

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $s = $this->db->prepare("
            INSERT INTO users (username, email, password)
            VALUES (:u, :e, :p)
        ");
        $ok = $s->execute([':u' => $username, ':e' => $email, ':p' => $hash]);

        return $ok ? (int) $this->db->lastInsertId() : null;
    }
}