<?php


namespace SqlQuery;


interface SqlQueryInterface
{


    /**
     * @return string, the sql query
     */
    public function getSqlQuery();

    /**
     * @return string, the count sql request
     */
    public function getCountSqlQuery();

    /**
     * @return array of marker => value (see QuickPdo for more info)
     */
    public function getMarkers();

    /**
     * @return array|null,
     *          if array: [offset, length]
     */
    public function getLimit();





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @param $field, for instance:
     *
     *      - pseudo
     *      - a.pseudo
     *      - a.pseudo, a.email, b.type
     */
    public function addField(string $field);


    /**
     * @param $table, you can add your aliases too if you want, for instance
     *      - ek_user
     *      - ek_user u
     */
    public function setTable(string $table);


    /**
     * @param $join, for instance:
     *
     *      - inner join table2 t on t.id=p.product_id
     *      - inner join table2 t on t.id=p.product_id
     *        inner join table3 t2 on t2.id=h.item_id
     *      - ...
     *
     */
    public function addJoin(string $join);

    /**
     * @param $where, never include the where keyword, but always
     *      start with and or or (the concrete class must prefix your clause with
     *      where 1).
     *
     *
     *      For instance:
     *
     *      - and pseudo='michel'
     *      - and (pseudo='michel' or e.country_id=6)
     *
     */
    public function addWhere(string $where);


    /**
     * @param $orderBy, is the name of a column
     * @param $direction, is either asc or desc
     *
     */
    public function addOrderBy(string $orderBy, string $direction);


    /**
     * mysql style limit clause params
     *
     * @param $offset
     * @param $length
     */
    public function setLimit(int $offset, int $length);

    /**
     * Adds a QuickPdo style marker.
     *
     * @param string $key
     * @param string $value
     *
     * @see https://github.com/lingtalfi/Quickpdo
     *
     */
    public function addMarker(string $key, string $value);


    //--------------------------------------------
    //
    //--------------------------------------------
    public function __toString();


}