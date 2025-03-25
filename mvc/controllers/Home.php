<?php
class Home extends Controller {
    public function index() {
        // Burada model verileri çağırabilirsiniz
        // $user = $this->model('User');
        // $userData = $user->getUser(1);
        
        $data = [
            'title' => 'Ana Sayfa',
            'content' => 'MVC Yapısı Başarıyla Çalışıyor!'
        ];
        
        $this->view('home/index', $data);
    }
}
?>