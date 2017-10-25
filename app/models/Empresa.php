<?php

class Empresa extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $codEmpresa;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=false)
     */
    public $nombreEmpresa;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    public $estadoRegistro;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $fechaInsercion;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $usuarioInsercion;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $fechaModificacion;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $usuarioModificacion;

    /**
     * Method to set the value of field codEmpresa
     *
     * @param integer $codEmpresa
     * @return $this
     */
    public function setCodEmpresa($codEmpresa)
    {
        $this->codEmpresa = $codEmpresa;

        return $this;
    }

    /**
     * Method to set the value of field nombreEmpresa
     *
     * @param string $nombreEmpresa
     * @return $this
     */
    public function setNombreEmpresa($nombreEmpresa)
    {
        $this->nombreEmpresa = $nombreEmpresa;

        return $this;
    }

    /**
     * Method to set the value of field estadoRegistro
     *
     * @param string $estadoRegistro
     * @return $this
     */
    public function setEstadoRegistro($estadoRegistro)
    {
        $this->estadoRegistro = $estadoRegistro;

        return $this;
    }

    /**
     * Method to set the value of field fechaInsercion
     *
     * @param string $fechaInsercion
     * @return $this
     */
    public function setFechaInsercion($fechaInsercion)
    {
        $this->fechaInsercion = $fechaInsercion;

        return $this;
    }

    /**
     * Method to set the value of field usuarioInsercion
     *
     * @param integer $usuarioInsercion
     * @return $this
     */
    public function setUsuarioInsercion($usuarioInsercion)
    {
        $this->usuarioInsercion = $usuarioInsercion;

        return $this;
    }

    /**
     * Method to set the value of field fechaModificacion
     *
     * @param string $fechaModificacion
     * @return $this
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    /**
     * Method to set the value of field usuarioModificacion
     *
     * @param integer $usuarioModificacion
     * @return $this
     */
    public function setUsuarioModificacion($usuarioModificacion)
    {
        $this->usuarioModificacion = $usuarioModificacion;

        return $this;
    }

    /**
     * Returns the value of field codEmpresa
     *
     * @return integer
     */
    public function getCodEmpresa()
    {
        return $this->codEmpresa;
    }

    /**
     * Returns the value of field nombreEmpresa
     *
     * @return string
     */
    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
    }

    /**
     * Returns the value of field estadoRegistro
     *
     * @return string
     */
    public function getEstadoRegistro()
    {
        return $this->estadoRegistro;
    }

    /**
     * Returns the value of field fechaInsercion
     *
     * @return string
     */
    public function getFechaInsercion()
    {
        return $this->fechaInsercion;
    }

    /**
     * Returns the value of field usuarioInsercion
     *
     * @return integer
     */
    public function getUsuarioInsercion()
    {
        return $this->usuarioInsercion;
    }

    /**
     * Returns the value of field fechaModificacion
     *
     * @return string
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Returns the value of field usuarioModificacion
     *
     * @return integer
     */
    public function getUsuarioModificacion()
    {
        return $this->usuarioModificacion;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("incloudt");
        $this->setSource("empresa");
        $this->hasMany('codEmpresa', 'DatosEmpresa', 'codEmpresa', ['alias' => 'DatosEmpresa']);
        $this->hasMany('codEmpresa', 'EmpresaSistema', 'codEmpresa', ['alias' => 'EmpresaSistema']);
        $this->hasMany('codEmpresa', 'ParametrosGenerales', 'codEmpresa', ['alias' => 'ParametrosGenerales']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Empresa[]|Empresa|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Empresa|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'codEmpresa' => 'codEmpresa',
            'nombreEmpresa' => 'nombreEmpresa',
            'estadoRegistro' => 'estadoRegistro',
            'fechaInsercion' => 'fechaInsercion',
            'usuarioInsercion' => 'usuarioInsercion',
            'fechaModificacion' => 'fechaModificacion',
            'usuarioModificacion' => 'usuarioModificacion'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'empresa';
    }

}
