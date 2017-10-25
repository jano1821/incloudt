<?php

class ParametrosGenerales extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $codParametro;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $codEmpresa;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $identificadorParametro;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $descipcionParametro;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $valorParametro;

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
     * Method to set the value of field codParametro
     *
     * @param integer $codParametro
     * @return $this
     */
    public function setCodParametro($codParametro)
    {
        $this->codParametro = $codParametro;

        return $this;
    }

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
     * Method to set the value of field identificadorParametro
     *
     * @param string $identificadorParametro
     * @return $this
     */
    public function setIdentificadorParametro($identificadorParametro)
    {
        $this->identificadorParametro = $identificadorParametro;

        return $this;
    }

    /**
     * Method to set the value of field descipcionParametro
     *
     * @param string $descipcionParametro
     * @return $this
     */
    public function setDescipcionParametro($descipcionParametro)
    {
        $this->descipcionParametro = $descipcionParametro;

        return $this;
    }

    /**
     * Method to set the value of field valorParametro
     *
     * @param string $valorParametro
     * @return $this
     */
    public function setValorParametro($valorParametro)
    {
        $this->valorParametro = $valorParametro;

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
     * Returns the value of field codParametro
     *
     * @return integer
     */
    public function getCodParametro()
    {
        return $this->codParametro;
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
     * Returns the value of field identificadorParametro
     *
     * @return string
     */
    public function getIdentificadorParametro()
    {
        return $this->identificadorParametro;
    }

    /**
     * Returns the value of field descipcionParametro
     *
     * @return string
     */
    public function getDescipcionParametro()
    {
        return $this->descipcionParametro;
    }

    /**
     * Returns the value of field valorParametro
     *
     * @return string
     */
    public function getValorParametro()
    {
        return $this->valorParametro;
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
        $this->setSource("parametros_generales");
        $this->belongsTo('codEmpresa', '\Empresa', 'codEmpresa', ['alias' => 'Empresa']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ParametrosGenerales[]|ParametrosGenerales|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ParametrosGenerales|\Phalcon\Mvc\Model\ResultInterface
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
            'codParametro' => 'codParametro',
            'codEmpresa' => 'codEmpresa',
            'identificadorParametro' => 'identificadorParametro',
            'descipcionParametro' => 'descipcionParametro',
            'valorParametro' => 'valorParametro',
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
        return 'parametros_generales';
    }

}
