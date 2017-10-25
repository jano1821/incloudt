<?php

class UsuarioSistema extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $codUsuario;

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $codEmpresa;

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $codSistema;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    protected $estadoRegistro;

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
     * Returns the value of field codSistema
     *
     * @return integer
     */
    public function getCodSistema()
    {
        return $this->codSistema;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("incloudt");
        $this->setSource("usuario_sistema");
        $this->belongsTo('codSistema', '\Sistema', 'codSistema', ['alias' => 'Sistema']);
        $this->belongsTo('codUsuario', '\Usuario', 'codUsuario', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuario_sistema';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsuarioSistema[]|UsuarioSistema|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsuarioSistema|\Phalcon\Mvc\Model\ResultInterface
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
            'codUsuario' => 'codUsuario',
            'codEmpresa' => 'codEmpresa',
            'codSistema' => 'codSistema',
            'estadoRegistro' => 'estadoRegistro'
        ];
    }

}
