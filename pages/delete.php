<?php
//deletar pessoa
    public function deleteP($id){
        $delet = $this->pdo->prepare("DELETE FROM pessoa WHERE id = :id");
        $delet->bindValue(":id", $id);
        $delet->execute();
    }
?>