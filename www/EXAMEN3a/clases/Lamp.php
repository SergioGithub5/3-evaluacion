<?php
Class Lamp extends Connection {

    protected $id;
    protected $name;
    protected $onoff;
    protected $model;
    protected $power;
    protected $zone;


    
    public function __construct($id, $name, $onoff, $model, $power, $zone){

        $this->id = $id;
        $this->name = $name;
        $this->onoff = $onoff;
        $this->model = $model;
        $this->power = $power;
        $this->zone = $zone;
}
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getOnoff()
    {
        return $this->onoff;
    }
    
    public function setOnoff($onoff)
    {
        $this->onoff = $onoff;

        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }
 
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    public function getPower()
    {
        return $this->power;
    }

    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    public function getZone()
    {
        return $this->zone;
    }

    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }
}
?>