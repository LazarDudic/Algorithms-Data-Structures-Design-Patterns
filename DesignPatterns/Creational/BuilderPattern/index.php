<?php


interface QueryBuilder
{
    public function select(string $table, array $columns): QueryBuilder;
    public function where(string $column, string $value, string $operator = '='): QueryBuilder;
    public function take(int $number): QueryBuilder;
    public function orderBy(string $column, string $order): QueryBuilder;
    public function getQuery(): string;
}


class MysqlQueryBuilder implements QueryBuilder {

    private $query;
    
    protected function reset(): void
    {
        $this->query = '';
    }

    public function select(string $table, array $columns = ['*']): QueryBuilder 
    {
        $this->reset();
        $this->query = "SELECT " . implode(", ", $columns) . " FROM " . $table;
        return $this;
    }

    public function where(string $column, string $value, string $operator = '='): QueryBuilder 
    {
        $this->query .= " WHERE " . $column. " " .$operator. " " . $value;
        return $this;
    }

    public function take(int $number): QueryBuilder 
    {
        $this->query .= " LIMIT " . $number;
        return $this;
    }

    public function orderBy(string $column, string $order): QueryBuilder 
    {
        $this->query .= " ORDER BY " . $column . " " . strtoupper($order);
        return $this;
    }

    public function getQuery(): string 
    {
        return $this->query;  
    }


}

$query = (new MysqlQueryBuilder())
            ->select('users')
            ->where('created_at', date('Y-m-d', strtotime('-30 days')), '>')
            ->orderBy('created_at', 'asc')
            ->getQuery();

echo $query;