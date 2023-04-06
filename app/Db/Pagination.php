<?php 

    namespace App\Db;

    class Pagination{
        private int $limit;
        private int $results;
        private int $pages;
        private int $currentPage;

        public function __construct(int $results,int $currentPage = 1,int $limit = 10)
        {
            $this->results = $results;
            $this->limit = $limit;
            $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
            $this->calculate();
        }

        private function calculate():void
        {
            $this->pages = $this->results > 0 ? ceil($this->results/$this->limit): 1;

            $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
        }

        public function getLimit():string
        {
            $offset = ($this->limit * ($this->currentPage - 1));
            return $offset. ','.$this->limit;
        }

        public function getPages(): array
        {
            if ($this->pages == 1)return [];
            $paginas = [];
            for($i = 1; $i <= $this->pages; $i++){
                $paginas[] = [
                    'pagina' => $i,
                    'atual' => $i == $this->currentPage
                ];
            }
            return $paginas;
        }
    }

?>