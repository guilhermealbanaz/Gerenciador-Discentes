<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;


class Observacao
{
    public null|int $idob;
    public null|int $idturmaaluno;
    public null|int $idaluno;
    public string $descricao;
    public string $data;

    public function cadastrar(): bool
    {
        $obDatabase = new Database('observacoes');
        $this->idob = $obDatabase->insert([
            'idturmaaluno' => $this->idturmaaluno,
            'idaluno' => $this->idaluno,
            'descricao' => $this->descricao,
            'data' => $this->data,
        ]);
        return true;
    }

    public function atualizar():bool{
        return (new Database('observacoes'))->update('idob= '.$this->idob,[
            'idturmaaluno' => $this->idturmaaluno,
            'idaluno' => $this->idaluno,
            'descricao' => $this->descricao,
            'data' => $this->data,
        ]);
    }

    public function excluir():bool
    {
        return (new Database('observacoes'))->delete('idob = '.$this->idob);
    }

    public static function getObservacoes(string $where = null, string $order = null, string $limit = null): array
    {
        return (new Database('observacoes'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getObservacao(int $idob): Observacao
    {
        return (new Database('observacoes'))->select('idob = ' . $idob)->fetchObject(self::class);
    }
    public static function getQtdObs(string $where = null): int
    {
        return (new Database('observacoes'))->select($where, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
    }
    
}
