<?php
class Field_Rel implements ArrayAccess
{
    private array $_Fields;

    function __construct(string ...$many_fields)
    {
        $this->_Fields = $many_fields;
    }
}
class Table_Field_Rel
{
    private string $_Table;
    private Field_Rel $_Table_Fields;

    function __construct(string $table_name, string ...$table_fields)
    {
        $this->_Table = $table_name;
        $this->_Table_Fields = new Field_Rel(...$table_fields);
    }
}

class Query_Capsule
{


}

    ?>