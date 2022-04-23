<?php

require_once "connection_to_db.php";
class Field_Rel 
{
    private array $_Fields;

    function __construct(string ...$many_fields)
    {
        $this->_Fields = $many_fields;
    }

    public function Data()
    {
        return $this->_Fields;
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

    public function Table()
    {
        return $this->_Table;
    }

    public function GobalField(int $index = 0)
    {
        return $this->Table() . '.' . $this->Field($index);
    }

    public function GlobalFields()
    {
        $array = $this->Fields()->Data();
        foreach ($array as $key => $value)
            $array[$key] = $this->Table() . '.' . $value;

        return new Field_Rel(...$array);
    }

    public function Field(int $index = 0)
    {
        return $this->Fields()->Data()[$index];
    }

    public function Fields()
    {
        return $this->_Table_Fields;
    }
}

class Query_Capsule
{
    function __construct(Table_Field_Rel ...$TFRs)
    {
       
        
        if ($TFRs)
            foreach ($TFRs as $TFR) {
                
                $this->_Tables[] = $TFR->Table();
                
                foreach ($TFR->GlobalFields()->Data() as $selection)
                    $this->_Selections[] = $selection;
            }
        else {
            $this->Tables[] = "";
            $this->Selections[] = "";
        }
 
        
    }
    protected array $_Selections;
    protected array $_Tables;

}

class MySQL_Query_Capsule extends Query_Capsule
{

    function InsertValuesQuery(string $values, string $fields = "", int $table_index = 0)
    {
        $table_name =$this->_Tables[0];
     
        $sql= "INSERT INTO {$table_name}  VALUES ({$values})";
      
        return $sql;
       
    }

    public function SelectFromQuery(string $selections=" ", string $select_format = ""): string
        {
            
            $table_name =$this->_Tables[0];
            if($this->_Selections){
            return "SELECT ".implode(",",$this->_Selections)." FROM {$table_name}";
            }
            return "SELECT * FROM {$table_name}";
        }

    public function Where($selection): string
        {
      
                return $selection." WHERE";
           
        }   

    public function AND($selection)
        {
            return $selection." and";
        }

    public function Setwhere($selection,$condition)
        {
            return $selection." {$condition}";
        }


}

    ?>