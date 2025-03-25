<?php
class User {
    public function getUser($id) {
        // Gerçek uygulamada bu veritabanından veri çekecek
        return [
            'id' => $id,
            'name' => 'Örnek Kullanıcı',
            'email' => 'ornek@email.com'
        ];
    }
}
?>