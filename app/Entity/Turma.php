<?php
namespace App\Entity;

use App\Db\Database;
use \PDO;

class Turma{
    public int $id;
    public string $turma;

    public function cadastrar():bool
    {
        $obDatabase = new Database('turma');

        $this->id = $obDatabase->insert([
            'turma' => $this->turma,
        ]);

        return true;
    }

    public static function getTurmas(string $where = null, string $order = null, string $limit = null): array
    {
        return (new Database('turma'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function excluir():bool
    {
        return (new Database('turma'))->delete('id = '.$this->id);
    }

    public static function getTurmaById(int $id): Turma
    {
        return (new Database('turma'))->select('id ='.$id)->fetchObject(self::class);
    }
    
    public static function getTurmaByName(string $name):Turma
    {
        return (new Database('turma'))->select('turma = '. $name)->fetchObject(self::class);
    }
}