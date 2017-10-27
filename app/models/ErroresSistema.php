<?php

class ErroresSistema extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $codError;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $codUsuario;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $codEmpresa;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=false)
     */
    protected $descripcionError;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    protected $claseError;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $fechaInsercion;

    /**
     * Method to set the value of field codError
     *
     * @param integer $codError
     * @return $this
     */
    public function setCodError($codError)
    {
        $this->codError = $codError;

        return $this;
    }

    /**
     * Method to set the value of field codUsuario
     *
     * @param integer $codUsuario
     * @return $this
     */
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;

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
     * Method to set the value of field descripcionError
     *
     * @param string $descripcionError
     * @return $this
     */
    public function setDescripcionError($descripcionError)
    {
        $this->descripcionError = $descripcionError;

        return $this;
    }

    /**
     * Method to set the value of field claseError
     *
     * @param string $claseError
     * @return $this
     */
    public function setClaseError($claseError)
    {
        $this->claseError = $claseError;

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
     * Returns the value of field codError
     *
     * @return integer
     */
    public function getCodError()
    {
        return $this->codError;
    }

    /**
     * Returns the value of field codUsuario
     *
     * @return integer
     */
    public function getCodUsuario()
    {
        return $this->codUsuario;
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
     * Returns the value of field descripcionError
     *
     * @return string
     */
    public function getDescripcionError()
    {
        return $this->descripcionError;
    }

    /**
     * Returns the value of field claseError
     *
     * @return string
     */
    public function getClaseError()
    {
        return $this->claseError;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("incloudt");
        $this->setSource("errores_sistema");
        $this->belongsTo('codEmpresa', '\Empresa', 'codEmpresa', ['alias' => 'Empresa']);
        $this->belongsTo('codUsuario', '\Usuario', 'codUsuario', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'errores_sistema';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ErroresSistema[]|ErroresSistema|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ErroresSistema|\Phalcon\Mvc\Model\ResultInterface
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
            'codError' => 'codError',
            'codUsuario' => 'codUsuario',
            'codEmpresa' => 'codEmpresa',
            'descripcionError' => 'descripcionError',
            'claseError' => 'claseError',
            'fechaInsercion' => 'fechaInsercion'
        ];
    }

}
