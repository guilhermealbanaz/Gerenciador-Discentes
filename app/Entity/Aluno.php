<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Aluno
{
    public int $idaluno;
    public int $idturma;
    public string $nome;

    public function cadastrar():bool
    {
        $obDatabase = new Database('aluno');

        $this->idaluno = $obDatabase->insert([
            'idturma' => $this->idturma,
            'nome' => $this->nome,
        ]);

        return true;
    }

    public static function getAlunos(string $where = null, string $order = null, string $limit = null): array
    {
        return (new Database('aluno'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function excluir():bool
    {
        return (new Database('aluno'))->delete('idaluno = '.$this->idaluno);
    }

    public static function getAlunoById(int $id):Aluno
    {
        return (new Database('aluno'))->select('idaluno =' .$id)->fetchObject(self::class);
    }
    public static function getAlunoByName(string $name):Aluno|bool
    {   try {
        return (new Database('aluno'))->selectLike($name)->fetchObject(self::class);
    } catch (\Throwable $th) {
        return false;
    }
        
    }
}
