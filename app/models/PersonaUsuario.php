<?php

class PersonaUsuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $codPersonaUsuario;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=false)
     */
    public $nombresPersona;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=false)
     */
    public $apellidosPersona;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $numeroDocumento;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=true)
     */
    public $numeroCelular;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=true)
     */
    public $numeroAnexo;

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
     * @var string
     * @Column(type="string", length=30, nullable=false)
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
     * @var string
     * @Column(type="string", length=30, nullable=true)
     */
    public $usuarioModificacion;

    /**
     * Method to set the value of field codPersonaUsuario
     *
     * @param integer $codPersonaUsuario
     * @return $this
     */
    public function setCodPersonaUsuario($codPersonaUsuario)
    {
        $this->codPersonaUsuario = $codPersonaUsuario;

        return $this;
    }

    /**
     * Method to set the value of field nombresPersona
     *
     * @param string $nombresPersona
     * @return $this
     */
    public function setNombresPersona($nombresPersona)
    {
        $this->nombresPersona = $nombresPersona;

        return $this;
    }

    /**
     * Method to set the value of field apellidosPersona
     *
     * @param string $apellidosPersona
     * @return $this
     */
    public function setApellidosPersona($apellidosPersona)
    {
        $this->apellidosPersona = $apellidosPersona;

        return $this;
    }

    /**
     * Method to set the value of field numeroDocumento
     *
     * @param string $numeroDocumento
     * @return $this
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;

        return $this;
    }

    /**
     * Method to set the value of field numeroCelular
     *
     * @param string $numeroCelular
     * @return $this
     */
    public function setNumeroCelular($numeroCelular)
    {
        $this->numeroCelular = $numeroCelular;

        return $this;
    }

    /**
     * Method to set the value of field numeroAnexo
     *
     * @param string $numeroAnexo
     * @return $this
     */
    public function setNumeroAnexo($numeroAnexo)
    {
        $this->numeroAnexo = $numeroAnexo;

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
     * @param string $usuarioInsercion
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
     * @param string $usuarioModificacion
     * @return $this
     */
    public function setUsuarioModificacion($usuarioModificacion)
    {
        $this->usuarioModificacion = $usuarioModificacion;

        return $this;
    }

    /**
     * Returns the value of field codPersonaUsuario
     *
     * @return integer
     */
    public function getCodPersonaUsuario()
    {
        return $this->codPersonaUsuario;
    }

    /**
     * Returns the value of field nombresPersona
     *
     * @return string
     */
    public function getNombresPersona()
    {
        return $this->nombresPersona;
    }

    /**
     * Returns the value of field apellidosPersona
     *
     * @return string
     */
    public function getApellidosPersona()
    {
        return $this->apellidosPersona;
    }

    /**
     * Returns the value of field numeroDocumento
     *
     * @return string
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Returns the value of field numeroCelular
     *
     * @return string
     */
    public function getNumeroCelular()
    {
        return $this->numeroCelular;
    }

    /**
     * Returns the value of field numeroAnexo
     *
     * @return string
     */
    public function getNumeroAnexo()
    {
        return $this->numeroAnexo;
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
     * @return string
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
     * @return string
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
        $this->setSource("persona_usuario");
        $this->hasMany('codPersonaUsuario', 'Usuario', 'codPersonaUsuario', ['alias' => 'Usuario']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PersonaUsuario[]|PersonaUsuario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PersonaUsuario|\Phalcon\Mvc\Model\ResultInterface
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
            'codPersonaUsuario' => 'codPersonaUsuario',
            'nombresPersona' => 'nombresPersona',
            'apellidosPersona' => 'apellidosPersona',
            'numeroDocumento' => 'numeroDocumento',
            'numeroCelular' => 'numeroCelular',
            'numeroAnexo' => 'numeroAnexo',
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
        return 'persona_usuario';
    }

}
