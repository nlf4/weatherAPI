<?php
class DBManager
{
    private $PDO;

    public function __construct( PDO $PDO )
    {
        $this->PDO = $PDO;
    }

    public function GetData( $sql )
    {
        $stm = $this->PDO->prepare($sql);
        $stm->execute();

        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function ExecuteSQL( $sql )
    {
        $stm = $this->PDO->prepare($sql);

        if ( $stm->execute() ) return true;
        else return false;
    }
}