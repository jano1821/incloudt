<?php

class Sistema extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $codSistema;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=true)
     */
    public $etiquetaSistema;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=true)
     */
    public $urlSistema;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=true)
     */
    public $urlIcono;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=true)
     */
    public $estadoRegistro;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $fechaInsercion;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=true)
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
     * Method to set the value of field codSistema
     *
     * @param integer $codSistema
     * @return $this
     */
    public function setCodSistema($codSistema)
    {
        $this->codSistema = $codSistema;

        return $this;
    }

    /**
     * Method to set the value of field etiquetaSistema
     *
     * @param string $etiquetaSistema
     * @return $this
     */
    public function setEtiquetaSistema($etiquetaSistema)
    {
        $this->etiquetaSistema = $etiquetaSistema;

        return $this;
    }

    /**
     * Method to set the value of field urlSistema
     *
     * @param string $urlSistema
     * @return $this
     */
    public function setUrlSistema($urlSistema)
    {
        $this->urlSistema = $urlSistema;

        return $this;
    }

    /**
     * Method to set the value of field urlIcono
     *
     * @param string $urlIcono
     * @return $this
     */
    public function setUrlIcono($urlIcono)
    {
        $this->urlIcono = $urlIcono;

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
     * Returns the value of field codSistema
     *
     * @return integer
     */
    public function getCodSistema()
    {
        return $this->codSistema;
    }

    /**
     * Returns the value of field etiquetaSistema
     *
     * @return string
     */
    public function getEtiquetaSistema()
    {
        return $this->etiquetaSistema;
    }

    /**
     * Returns the value of field urlSistema
     *
     * @return string
     */
    public function getUrlSistema()
    {
        return $this->urlSistema;
    }

    /**
     * Returns the value of field urlIcono
     *
     * @return string
     */
    public function getUrlIcono()
    {
        return $this->urlIcono;
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
        $this->setSource("sistema");
        $this->hasMany('codSistema', 'EmpresaSistema', 'codSistema', ['alias' => 'EmpresaSistema']);
        $this->hasMany('codSistema', 'UsuarioSistema', 'codSistema', ['alias' => 'UsuarioSistema']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sistema[]|Sistema|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sistema|\Phalcon\Mvc\Model\ResultInterface
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
            'codSistema' => 'codSistema',
            'etiquetaSistema' => 'etiquetaSistema',
            'urlSistema' => 'urlSistema',
            'urlIcono' => 'urlIcono',
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
        return 'sistema';
    }

}
