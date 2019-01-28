<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 28.01.2019
 * Time: 13:52
 */

class QueryBuilder
{
    function getFirst()
    {
        $pdo = new PDO("mysql:host=localhost; dbname=testworktrafgid", "root", "");
        $sql = "
            SELECT offers.name, requests.id, requests.price,requests.count,operators.fio
            FROM requests,offers,operators
            WHERE requests.offer_id=offers.id
            AND requests.operator_id=operators.id 
            AND requests.count>2
            AND (requests.operator_id=10 OR requests.operator_id=12)
        ";
        $statement = $pdo->prepare($sql); //подготовить
        $result = $statement->execute(); //true || false
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }
    function getSecond()
    {
        $pdo = new PDO("mysql:host=localhost; dbname=testworktrafgid", "root", "");
        $sql = "
        SELECT offers.name, requests.count, SUM(requests.price*requests.count) AS 'общая сумма по товару'
        FROM requests, offers
        WHERE requests.offer_id=offers.id
        GROUP BY offers.name
       ";
        $statement = $pdo->prepare($sql); //подготовить
        $result = $statement->execute(); //true || false
        $sum = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $sum;
    }
}